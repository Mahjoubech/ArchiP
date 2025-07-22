<template>
    <div class="flex items-center justify-center min-h-[50vh] bg-transparent px-4 sm:px-6 lg:px-8">
      <div class="bg-white rounded-lg shadow-lg p-6 sm:p-8 max-w-lg w-full mx-auto">
        <div class="text-center">
          <div class="text-red-500 mb-4 sm:mb-6">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 mx-auto" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18.364 5.636a9 9 0 11-12.728 0 9 9 0 0112.728 0zM12 8v4m0 4h.01" />
            </svg>
          </div>
          <h1 class="text-2xl font-bold text-red-600">Oops! Une erreur est survenue</h1>
          <p class="text-gray-600 mt-2">
            {{ message }}
          </p>
        </div>
      </div>
    </div>
  </template>
  
  <script>
  export default {
    props: {
      message: {
        required: true,
      },
    },
  };
  </script>
  
