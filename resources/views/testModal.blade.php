<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tailwind CSS Modal</title>
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">
  <div class="container mx-auto p-6">
    <!-- Button to Open Modal -->
    <button id="openModal" class="bg-blue-500 text-white px-4 py-2 rounded">
      Open Modal
    </button>

    <!-- Modal -->
    <div id="modal" class="fixed inset-0 z-50 flex items-center justify-center hidden">
      <!-- Modal Overlay -->
      <div id="modalOverlay" class="fixed inset-0 bg-black opacity-50"></div>

      <!-- Modal Content -->
      <div class="bg-white rounded-lg shadow-lg w-11/12 md:w-1/2 lg:w-1/3 z-50">
        <!-- Modal Header -->
        <div class="p-4 border-b">
          <h2 class="text-xl font-semibold">Modal Title</h2>
        </div>

        <!-- Modal Body -->
        <div class="p-4">
          <p>This is a modal created with Tailwind CSS!</p>
        </div>

        <!-- Modal Footer -->
        <div class="p-4 border-t flex justify-end space-x-2">
          <button id="closeModal" class="bg-gray-300 text-gray-700 px-4 py-2 rounded">
            Close
          </button>
          <button class="bg-blue-500 text-white px-4 py-2 rounded">
            Save
          </button>
        </div>
      </div>
    </div>
  </div>

  




  <script>
    // JavaScript to handle modal open/close
    const modal = document.getElementById('modal');
    const openModalButton = document.getElementById('openModal');
    const closeModalButton = document.getElementById('closeModal');
    const modalOverlay = document.getElementById('modalOverlay');

    // Open Modal
    openModalButton.addEventListener('click', () => {
      modal.classList.remove('hidden');
    });

    // Close Modal
    closeModalButton.addEventListener('click', () => {
      modal.classList.add('hidden');
    });

    // Close Modal when clicking outside
    modalOverlay.addEventListener('click', () => {
      modal.classList.add('hidden');
    });
  </script>
    
  <style>
    @keyframes fadeIn {
  from { opacity: 0; }
  to { opacity: 1; }
}

@keyframes fadeOut {
  from { opacity: 1; }
  to { opacity: 0; }
}

.fade-in {
  animation: fadeIn 0.3s ease-in-out;
}

.fade-out {
  animation: fadeOut 0.3s ease-in-out;
}
  </style>
</body>
</html>