

  <div class="min-h-screen flex items-center justify-center p-4">
    <div class="bg-white shadow-lg rounded-lg p-8 w-full max-w-md">
      <h2 class="text-2xl font-bold mb-6 text-center">Login</h2>
      <form wire:submit="login">
        <!-- Email Input -->
        <div class="mb-4">
          <label for="email" class="block text-sm font-medium text-gray-700">อีเมลล์</label>
          <input wire:model="email"
            type="email"
            id="email"
            name="email"
            placeholder="Enter your email"
            class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500"
          />
        </div>

        <!-- Password Input -->
        <div class="mb-6">
          <label for="password" class="block text-sm font-medium text-gray-700">รหัสผ่าน</label>
          <input wire:model="password"
            type="password"
            id="password"
            name="password"
            placeholder="Enter your password"
            class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500"
          />
        </div>

        <!-- Submit Button -->
        <button
          type="submit"
          class="w-full bg-blue-500 text-white py-2 px-4 rounded-md hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2"
        >
          เข้าสู่ระบบ
        </button>

        <!-- Register Link -->
        <p class="mt-4 text-center text-sm text-gray-600">
          Don't have an account? 
          <a href="#" class="text-blue-500 hover:text-blue-600">Register here</a>
        </p>
      </form>
    </div>
  </div>

