<template>
  <div class="flex items-center justify-center h-80">
    <div class="animate-spin rounded-full h-16 w-16 border-t-4 border-red-500 border-opacity-70"></div>
      </div>
    </template>
    
    <script>
    export default {
      name: "LoadingSpinner",
    };
    </script>
    
    <style scoped>
    .animate-spin {
      animation: spin 1s linear infinite;
    }
    
    @keyframes spin {
      0% {
        transform: rotate(0deg);
      }
      100% {
        transform: rotate(360deg);
      }
    }
    </style>