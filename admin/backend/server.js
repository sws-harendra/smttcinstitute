import express from 'express';
import mysql from 'mysql2/promise';
import cors from 'cors';
import jwt from 'jsonwebtoken';
import multer from 'multer';
import path from 'path';

import 'dotenv/config';

const app = express();
app.use(cors());
app.use(express.json());

// Serve uploads folder statically so images can be loaded via URL
app.use('/uploads', express.static('uploads'));

const JWT_SECRET = process.env.JWT_SECRET || 'super-secret-admin-key-smttc';

// Database connection
const pool = mysql.createPool({
  host: 'db',
  port: 3306,
  user: process.env.MYSQL_USER || 'dbuser',
  password: process.env.MYSQL_PASSWORD || 'dbpassword',
  database: process.env.MYSQL_DATABASE || 'smttc_db',
  waitForConnections: true,
  connectionLimit: 10,
  queueLimit: 0
});

// Multer Storage Configuration
const storage = multer.diskStorage({
  destination: function (req, file, cb) {
    cb(null, 'uploads/');
  },
  filename: function (req, file, cb) {
    const uniqueSuffix = Date.now() + '-' + Math.round(Math.random() * 1E9);
    cb(null, uniqueSuffix + path.extname(file.originalname));
  }
});
const upload = multer({ storage: storage });

// Middleware to check authentication
const authenticate = (req, res, next) => {
  const token = req.headers['authorization'];
  if (!token) return res.status(401).json({ error: 'Unauthorized' });

  jwt.verify(token.split(' ')[1], JWT_SECRET, (err, user) => {
    if (err) return res.status(403).json({ error: 'Forbidden: Invalid token' });
    req.user = user;
    next();
  });
};

// POST Login
app.post('/api/login', async (req, res) => {
  const { username, password } = req.body;
  try {
    const [rows] = await pool.query('SELECT * FROM admin_users WHERE username = ? AND password = ?', [username, password]);
    if (rows.length > 0) {
      const user = rows[0];
      const token = jwt.sign({ id: user.id, username: user.username }, JWT_SECRET, { expiresIn: '24h' });
      res.json({ token, message: 'Login successful' });
    } else {
      res.status(401).json({ error: 'Invalid username or password' });
    }
  } catch (error) {
    console.error('Login error:', error);
    res.status(500).json({ error: 'Server error during login' });
  }
});

// GET all blogs (Public)
app.get('/api/blogs', async (req, res) => {
  try {
    const [rows] = await pool.query('SELECT * FROM blogs ORDER BY created_at DESC');
    res.json(rows);
  } catch (error) {
    console.error('Error fetching blogs:', error);
    res.status(500).json({ error: 'Failed to fetch blogs' });
  }
});

// POST a new blog with image upload (Protected)
app.post('/api/blogs', authenticate, upload.single('image'), async (req, res) => {
  const { title, content } = req.body;
  if (!title || !content) {
    return res.status(400).json({ error: 'Title and content are required' });
  }
  
  // If file is uploaded, use the server URL. If not, it can be null.
  const imageUrl = req.file ? `/uploads/${req.file.filename}` : null;

  try {
    const [result] = await pool.query(
      'INSERT INTO blogs (title, content, image_url) VALUES (?, ?, ?)',
      [title, content, imageUrl]
    );
    res.status(201).json({ id: result.insertId, image_url: imageUrl, message: 'Blog created successfully' });
  } catch (error) {
    console.error('Error creating blog:', error);
    res.status(500).json({ error: 'Failed to create blog' });
  }
});

// GET all slider images (Public)
app.get('/api/slider', async (req, res) => {
  try {
    const [rows] = await pool.query('SELECT * FROM slider_images ORDER BY created_at DESC');
    res.json(rows);
  } catch (error) {
    console.error('Error fetching slider images:', error);
    res.status(500).json({ error: 'Failed to fetch slider images' });
  }
});

// POST a new slider image (Protected)
app.post('/api/slider', authenticate, upload.single('image'), async (req, res) => {
  if (!req.file) {
    return res.status(400).json({ error: 'Image file is required' });
  }
  
  const imageUrl = `/uploads/${req.file.filename}`;

  try {
    const [result] = await pool.query(
      'INSERT INTO slider_images (image_url) VALUES (?)',
      [imageUrl]
    );
    res.status(201).json({ id: result.insertId, image_url: imageUrl, message: 'Slider image added successfully' });
  } catch (error) {
    console.error('Error adding slider image:', error);
    res.status(500).json({ error: 'Failed to add slider image' });
  }
});

// DELETE a slider image (Protected)
app.delete('/api/slider/:id', authenticate, async (req, res) => {
  const { id } = req.params;
  try {
    await pool.query('DELETE FROM slider_images WHERE id = ?', [id]);
    res.json({ message: 'Slider image deleted successfully' });
  } catch (error) {
    console.error('Error deleting slider image:', error);
    res.status(500).json({ error: 'Failed to delete slider image' });
  }
});

const PORT = process.env.PORT || 3000;
app.listen(PORT, () => {
  console.log(`Backend server running on port ${PORT}`);
});
