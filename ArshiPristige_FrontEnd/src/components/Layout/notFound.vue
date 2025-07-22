<template>
    <div class="py-12 px-4 sm:px-6 lg:px-8 flex flex-col items-center justify-center">
      <div class="max-w-5xl w-full space-y-8">
        <div class="flex flex-col md:flex-row items-center justify-between gap-10">
          <div class="space-y-6 text-center md:text-left md:w-1/2">
            <h1 class="text-4xl md:text-6xl font-bold">
              <span class="block text-[#C9559B]">Oups!</span>
              <span class="block text-gray-900">Page introuvable</span>
            </h1>
            
            <div class="bg-white p-6 rounded-lg shadow-md border-l-4 border-[#00B3AD]">
              <h2 class="text-2xl font-semibold text-gray-700 mb-2">Erreur 404</h2>
              <p class="text-gray-600 mb-4">
                La page que vous recherchez n'existe pas ou a été déplacée.
              </p>
              <div class="flex flex-col sm:flex-row gap-3">
                <router-link to="/" class="inline-flex items-center justify-center px-5 py-3 border border-transparent text-base font-medium rounded-md shadow-sm text-white bg-[#00B3AD] hover:bg-[#00B3AD]/90 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-[#00B3AD] transition-colors">
                  <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                  </svg>
                  Page d'accueil
                </router-link>
                
                <router-link to="/contact" class="inline-flex items-center justify-center px-5 py-3 border border-gray-300 text-base font-medium rounded-md shadow-sm text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-[#C9559B] transition-colors">
                  <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                  </svg>
                  Contactez-nous
                </router-link>
              </div>
            </div>
            
            <p class="text-gray-500 text-sm">
              Si vous pensez que c'est une erreur, veuillez nous contacter.
            </p>
          </div>
          
          <div class="w-full md:w-1/2 flex justify-center">
            <div class="relative">
              <div class="text-[15rem] leading-none font-extrabold text-[#00B3AD]/10">
                404
              </div>
              <div class="absolute inset-0 flex items-center justify-center">
                <div class="text-center">
                  <img src="/images/404.png" alt="Page not found" class="w-64 h-64 mx-auto" 
                    onerror="this.onerror=null; this.src='data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iMjAwIiBoZWlnaHQ9IjIwMCIgdmlld0JveD0iMCAwIDIwMCAyMDAiIGZpbGw9Im5vbmUiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+PHJlY3Qgd2lkdGg9IjIwMCIgaGVpZ2h0PSIyMDAiIGZpbGw9IiNGMkYyRjIiLz48cGF0aCBkPSJNMTAwIDcwQzExMi4xNSA3MCAxMjIgODAuMjk3NSAxMjIgOTNDMTIyIDEwNS43MDIgMTEyLjE1IDExNiAxMDAgMTE2Qzg3Ljg1MDUgMTE2IDc4IDEwNS43MDIgNzggOTNDNzggODAuMjk3NSA4Ny44NTA1IDcwIDEwMCA3MFoiIGZpbGw9IiNDOTU1OUIiLz48cGF0aCBkPSJNNjUuNTQ5OSAxMjlDNjkuMjUwMiAxMjkgNzIuMDQ5OSAxMzEuODE2IDcyLjA0OTkgMTM1LjVDNzIuMDQ5OSAxMzkuMTg0IDY5LjI1MDIgMTQyIDY1LjU0OTkgMTQyQzYxLjg0OTYgMTQyIDU5LjA0OTkgMTM5LjE4NCA1OS4wNDk5IDEzNS41QzU5LjA0OTkgMTMxLjgxNiA2MS44NDk2IDEyOSA2NS41NDk5IDEyOVoiIGZpbGw9IiMwMEIzQUQiLz48cGF0aCBkPSJNMTM3LjU1IDEyOUMxNDEuMjUgMTI5IDE0NC4wNSAxMzEuODE2IDE0NC4wNSAxMzUuNUMxNDQuMDUgMTM5LjE4NCAxNDEuMjUgMTQyIDEzNy41NSAxNDJDMTMzLjg1IDE0MiAxMzEuMDUgMTM5LjE4NCAxMzEuMDUgMTM1LjVDMTMxLjA1IDEzMS44MTYgMTMzLjg1IDEyOSAxMzcuNTUgMTI5WiIgZmlsbD0iIzAwQjNBRCIvPjxwYXRoIGQ9Ik0xMDAgMTMwQzExMC40OTMgMTMwIDExOS4xODIgMTM3LjE2IDEyMCAxNDYuNUgxMjBDMTIwIDE0Ni41IDExMy42IDE0NiAxMDAgMTQ2Qzg2LjQgMTQ2IDgwIDE0Ni41IDgwIDE0Ni41SDgwQzgwLjgxODIgMTM3LjE2IDg5LjUwNjggMTMwIDEwMCAxMzBaIiBmaWxsPSIjMDBCM0FEIi8+PC9zdmc+Cg=='" />
                  <p class="text-2xl text-[#C9559B] font-medium mt-4">
                    Vous êtes perdu(e)...
                  </p>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>
    </div>
  </template>
  
  <script>
  export default {
    name: 'NotFound',
    metaInfo: {
      title: 'Page introuvable | BénévoMaroc'
    },
    mounted() {
      // On peut éventuellement utiliser cette méthode pour enregistrer les 404 dans les analytics
      console.log(`Page non trouvée: ${this.$route.fullPath}`);
    }
  }
  </script>