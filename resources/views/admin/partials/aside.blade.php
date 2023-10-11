<aside class="relative bg-sidebar h-screen w-64 hidden sm:block shadow-xl">
    <div class="p-6">
        <a href="/admin" class="text-white text-3xl font-semibold uppercase hove:text-gray-300">Admin</a>
        <button class="w-full bg-white cta-btn font-semibold py-2 mt-5 rounder-br-lg rounded-bl-lg rounded-tr-lg shadow-lg hover:shadow-xl hover:bg-gray-300 flex items-center justify-center"><i class="fas fa-plus mr-3"></i> New Report</button>
    </div>

    <nav class="text-white text-base font-semibold pt-3">

        <a href="/admin" class="flex items-center active-nav-link text-white py-4 pl-6 nav-item"><i class="fas fa-tachometer mr-3"></i> Dashboard</a>

        @can('user-list')
        <a href="/users" class="flex items-center text-white opacity-75 hover:opacity-100 py-4 pl-6 nav-item"><i class="fas fa-user mr-3"></i> Users</a>
        @endcan

        <a href="/admin/categories" class="flex items-center text-white opacity-75 hover:opacity-100 py-4 pl-6 nav-item"><i class="fas fa-table mr-3"></i> Categories</a>

        @can('brand-list')
        <a href="/admin/brands" class="flex items-center text-white opacity-75 hover:opacity-100 py-4 pl-6 nav-item"><i class="fas fa-table mr-3"></i> Brands</a>

        @endcan

        <a href="/admin/tags" class="flex items-center text-white opacity-75 hover:opacity-100 py-4 pl-6 nav-item"><i class="fas fa-table mr-3"></i> Tags</a>

        <a href="/products" class="flex items-center text-white opacity-75 hover:opacity-100 py-4 pl-6 nav-item"><i class="fas fa-table mr-3"></i> Products</a>

    </nav>

</aside>

