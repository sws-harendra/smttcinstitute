document.addEventListener('DOMContentLoaded', async () => {
    const blogContainer = document.getElementById('blog-container');

    try {
        const response = await fetch('http://localhost:3000/api/blogs');
        if (!response.ok) {
            throw new Error('Failed to fetch blogs');
        }
        
        const blogs = await response.json();
        
        if (blogs.length === 0) {
            blogContainer.innerHTML = '<p class="col-span-full text-center text-gray-500">No blog posts found.</p>';
            return;
        }

        let html = '';
        blogs.forEach(blog => {
            const date = new Date(blog.created_at).toLocaleDateString();
            let imageUrl = blog.image_url || 'assets/images/default-blog.webp';
            if (imageUrl.startsWith('/uploads')) {
                imageUrl = `http://localhost:3000${imageUrl}`;
            }
            html += `
                <div class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-lg transition">
                    <img src="${imageUrl}" alt="${blog.title}" class="w-full h-48 object-cover bg-gray-200">
                    <div class="p-6">
                        <p class="text-sm text-gray-500 mb-2">${date}</p>
                        <h3 class="text-xl font-bold mb-3">${blog.title}</h3>
                        <p class="text-gray-600 mb-4 line-clamp-3">${blog.content}</p>
                        <a href="#" class="text-[#FACA0A] font-semibold hover:underline">Read More &rarr;</a>
                    </div>
                </div>
            `;
        });

        blogContainer.innerHTML = html;
    } catch (error) {
        console.error('Error:', error);
        blogContainer.innerHTML = '<p class="col-span-full text-center text-red-500">Failed to load blogs. Please try again later.</p>';
    }
});
