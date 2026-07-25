// Check Authentication
const token = localStorage.getItem('adminToken');
if (!token) {
    window.location.href = 'login.html';
}

// Logout
document.getElementById('logoutBtn').addEventListener('click', () => {
    localStorage.removeItem('adminToken');
    window.location.href = 'login.html';
});

const API_BASE = 'http://localhost:3000/api';

// ================= BLOGS LOGIC =================

document.getElementById('blogForm').addEventListener('submit', async (e) => {
    e.preventDefault();

    const title = document.getElementById('title').value;
    const content = document.getElementById('content').value;
    const imageFile = document.getElementById('imageFile').files[0];
    
    const submitBtn = document.getElementById('submitBlogBtn');
    const messageDiv = document.getElementById('blogMessage');

    submitBtn.disabled = true;
    submitBtn.innerText = 'Publishing...';
    messageDiv.className = 'mt-4 hidden p-3 rounded-md text-center font-medium';

    const formData = new FormData();
    formData.append('title', title);
    formData.append('content', content);
    if (imageFile) {
        formData.append('image', imageFile);
    }

    try {
        const response = await fetch(`${API_BASE}/blogs`, {
            method: 'POST',
            headers: {
                'Authorization': `Bearer ${token}`
            },
            body: formData
        });

        if (response.ok) {
            messageDiv.innerText = 'Blog published successfully!';
            messageDiv.className = 'mt-6 block p-4 rounded-xl text-center text-sm font-medium bg-green-50 text-green-600 border border-green-100';
            document.getElementById('blogForm').reset();
        } else if (response.status === 401 || response.status === 403) {
            localStorage.removeItem('adminToken');
            window.location.href = 'login.html';
        } else {
            const err = await response.json();
            throw new Error(err.error || 'Failed to publish');
        }
    } catch (error) {
        messageDiv.innerText = error.message;
        messageDiv.className = 'mt-6 block p-4 rounded-xl text-center text-sm font-medium bg-red-50 text-red-600 border border-red-100';
    } finally {
        submitBtn.disabled = false;
        submitBtn.innerText = 'Publish Blog';
    }
});


// ================= SLIDER LOGIC =================

document.getElementById('sliderForm').addEventListener('submit', async (e) => {
    e.preventDefault();

    const imageFile = document.getElementById('sliderImageFile').files[0];
    const submitBtn = document.getElementById('submitSliderBtn');
    const messageDiv = document.getElementById('sliderMessage');

    if (!imageFile) return;

    submitBtn.disabled = true;
    submitBtn.innerHTML = 'Uploading...';
    messageDiv.className = 'mt-4 hidden p-3 rounded-md text-center font-medium';

    const formData = new FormData();
    formData.append('image', imageFile);

    try {
        const response = await fetch(`${API_BASE}/slider`, {
            method: 'POST',
            headers: {
                'Authorization': `Bearer ${token}`
            },
            body: formData
        });

        if (response.ok) {
            messageDiv.innerText = 'Image uploaded successfully!';
            messageDiv.className = 'mt-6 block p-4 rounded-xl text-center text-sm font-medium bg-green-50 text-green-600 border border-green-100';
            document.getElementById('sliderForm').reset();
            loadSliderImages(); // Refresh grid
        } else {
            const err = await response.json();
            throw new Error(err.error || 'Failed to upload');
        }
    } catch (error) {
        messageDiv.innerText = error.message;
        messageDiv.className = 'mt-6 block p-4 rounded-xl text-center text-sm font-medium bg-red-50 text-red-600 border border-red-100';
    } finally {
        submitBtn.disabled = false;
        submitBtn.innerHTML = '<i class="fa-solid fa-upload"></i> Upload';
    }
});

async function loadSliderImages() {
    const grid = document.getElementById('sliderGrid');
    grid.innerHTML = '<div class="text-gray-500 col-span-3 text-center py-8">Loading images...</div>';

    try {
        const response = await fetch(`${API_BASE}/slider`);
        const images = await response.json();

        if (images.length === 0) {
            grid.innerHTML = '<div class="text-slate-400 col-span-full text-center py-12"><p>No slider images uploaded yet.</p></div>';
            return;
        }

        grid.innerHTML = images.map(img => `
            <div class="border border-slate-200 rounded-2xl overflow-hidden shadow-sm hover:shadow-lg relative group transition-all duration-300">
                <img src="http://localhost:3000${img.image_url}" class="w-full h-56 object-cover transition-transform duration-500 group-hover:scale-105">
                <div class="absolute inset-0 bg-slate-900/40 backdrop-blur-[2px] flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                    <button onclick="deleteSliderImage(${img.id})" class="bg-red-500 text-white px-5 py-2.5 rounded-xl shadow-[0_4px_10px_rgba(239,68,68,0.4)] hover:bg-red-600 hover:-translate-y-1 transition-all">
                        <i class="fa-solid fa-trash-can mr-1"></i> Delete
                    </button>
                </div>
            </div>
        `).join('');
    } catch (error) {
        grid.innerHTML = '<div class="text-red-500 col-span-full text-center py-12"><p>Error loading images.</p></div>';
    }
}

async function deleteSliderImage(id) {
    if (!confirm('Are you sure you want to delete this image?')) return;

    try {
        const response = await fetch(`${API_BASE}/slider/${id}`, {
            method: 'DELETE',
            headers: {
                'Authorization': `Bearer ${token}`
            }
        });

        if (response.ok) {
            loadSliderImages();
        } else {
            alert('Failed to delete image');
        }
    } catch (error) {
        console.error('Delete error', error);
        alert('Server error while deleting');
    }
}
