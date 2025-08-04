<template>
    <div class="flex items-center justify-center min-h-[80vh] bg-gradient-to-br from-gray-100 to-gray-200 px-4 sm:px-6 lg:px-8">
      <div class="bg-white rounded-2xl shadow-xl p-8 sm:p-12 max-w-lg w-full text-center">
        <div class="text-red-500 mb-6">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16 mx-auto" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18.364 5.636a9 9 0 11-12.728 0 9 9 0 0112.728 0zM12 8v4m0 4h.01" />
          </svg>
        </div>
        <h1 class="text-3xl font-bold text-red-600 mb-4">Accès Refusé</h1>
        <p class="text-gray-700 mb-6">
          Vous n'avez pas l'autorisation d'accéder à cette page. Veuillez vérifier vos autorisations ou contacter un administrateur si nécessaire.
        </p>
        <div class="flex justify-center space-x-4">
          <button @click="goHome" class="px-6 py-2 bg-gray-800 text-white font-medium text-sm rounded-lg shadow hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-gray-800 focus:ring-offset-2">
            Retour à l'accueil
          </button>
        </div>
      </div>
    </div>
  </template>
  
  <script>
  export default {
    name: "Unauthorized",
    methods: {
      goHome() {
        this.$router.push("/");
      },
    },
  };
  </script>
  
  <style scoped>
  button {
    transition: background-color 0.2s, transform 0.2s;
  }
  
  button:hover {
    transform: translateY(-2px);
  }
  </style>