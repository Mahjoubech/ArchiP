<template>
    <div class="min-h-screen bg-[#F8F9FE]">
      <div class="container mx-auto px-4 py-6">
        <div class="flex flex-col space-y-6">
          <div class="bg-white rounded-lg shadow-sm p-6 border border-gray-100">
            <div class="flex flex-col md:flex-row items-start md:items-center justify-between gap-4 mb-4">
              <div class="flex items-center space-x-3">
                <div class="h-12 w-12 rounded-lg flex items-center justify-center bg-[#C9559B]/10">
                  <i class="fas fa-award text-[#C9559B] text-xl"></i>
                </div>
                <div>
                  <h1 class="text-2xl font-bold text-gray-900">Mes Certifications</h1>
                  <p class="text-sm text-gray-500">
                    Tous les certificats obtenus lors de vos participations
                  </p>
                </div>
              </div>
  
              <router-link 
                to="/profile" 
                class="px-4 py-2 border border-[#00B3AD] text-[#00B3AD] rounded-lg hover:bg-[#00B3AD]/5 transition-colors flex items-center text-sm"
              >
                <i class="fas fa-arrow-left mr-2"></i>
                Retour au profil
              </router-link>
            </div>
          </div>
  
          <div class="bg-white rounded-lg shadow-sm border border-gray-100 overflow-hidden">
            <div class="p-5 border-b flex justify-between items-center">
              <h2 class="text-lg font-semibold">Liste de mes certifications</h2>
            </div>
            
            <div v-if="loading" class="p-10 text-center">
              <div class="inline-block animate-spin rounded-full h-8 w-8 border-t-2 border-b-2 border-[#00B3AD]"></div>
              <p class="mt-2">Chargement...</p>
            </div>
            
            <div v-else-if="error" class="p-10 text-center text-red-500">
              <i class="fas fa-exclamation-circle text-3xl"></i>
              <p class="mt-2">{{ error }}</p>
              <button @click="fetchCertifications()" class="mt-4 px-4 py-2 bg-[#00B3AD] text-white rounded">
                Réessayer
              </button>
            </div>
            
            <div v-else-if="certifications.length === 0" class="p-10 text-center text-gray-500">
              <i class="fas fa-search text-gray-300 text-4xl mb-3"></i>
              <p>Aucune certification trouvée</p>
            </div>
            
            <div v-else class="p-6">
              <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
                <div 
                  v-for="cert in certifications" 
                  :key="cert.id" 
                  class="group bg-white rounded-xl shadow-sm hover:shadow-md transition-all duration-300 border border-gray-100 overflow-hidden"
                >
                  <div 
                    class="relative h-48 overflow-hidden cursor-pointer bg-gray-50"
                    @click="openCertificationImage(cert.image_path)"
                  >
                    <img 
                      :src="cert.image_path" 
                      :alt="cert.opportunite?.titre || 'Certification'" 
                      class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105"
                    />
                    <div class="absolute inset-0 bg-gradient-to-t from-black/40 to-transparent opacity-0 group-hover:opacity-100 transition-opacity flex items-center justify-center">
                      <span class="text-white text-xs px-2 py-1 bg-black/50 rounded">
                        Cliquer pour agrandir
                      </span>
                    </div>
                  </div>
                  
                  <div class="p-4">
                    <h3 class="font-medium text-gray-900 line-clamp-2 mb-2">
                      <i class="fas fa-certificate text-[#C9559B] mr-2"></i>
                      {{ cert.opportunite?.titre || 'Certification' }}
                    </h3>
                    
                    <div class="flex items-center justify-between text-sm">
                      <div class="flex items-center text-gray-600">
                        <i class="fas fa-calendar-alt text-[#C9559B] mr-2"></i>
                        <span>{{ formatDate(cert.created_at) }}</span>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            
            <div v-if="!loading && !error && pagination.last_page > 1" class="border-t border-gray-200 px-6 py-4 flex items-center justify-between">
              <p class="text-sm text-gray-700">
                Page <span class="font-medium">{{ pagination.current_page }}</span> sur <span class="font-medium">{{ pagination.last_page }}</span>
              </p>
              <div class="flex space-x-2">
                <button 
                  @click="changePage(pagination.current_page - 1)" 
                  :disabled="pagination.current_page === 1"
                  class="px-4 py-2 border border-gray-300 rounded-md bg-white text-sm font-medium text-gray-700 hover:bg-gray-50"
                  :class="{'opacity-50 cursor-not-allowed': pagination.current_page === 1}">
                  Précédent
                </button>
                <button 
                  @click="changePage(pagination.current_page + 1)" 
                  :disabled="pagination.current_page === pagination.last_page"
                  class="px-4 py-2 border border-gray-300 rounded-md bg-white text-sm font-medium text-gray-700 hover:bg-gray-50"
                  :class="{'opacity-50 cursor-not-allowed': pagination.current_page === pagination.last_page}">
                  Suivant
                </button>
              </div>
            </div>
          </div>
        </div>
      </div>
      
      <div
        v-if="showCertificationImageModal"
        class="fixed inset-0 flex items-center justify-center z-50 bg-black bg-opacity-75"
        @click="showCertificationImageModal = false"
      >
        <div class="relative max-w-4xl max-h-[90vh] bg-white rounded-lg overflow-hidden" @click.stop>
          <button 
            @click="showCertificationImageModal = false"
            class="absolute top-3 right-3 bg-white rounded-full p-2 shadow-lg z-10"
          >
            <i class="fas fa-times text-gray-700"></i>
          </button>
          <div class="p-2">
            <img 
              :src="selectedCertificationImage" 
              alt="Certification" 
              class="w-full h-auto max-h-[80vh] object-contain"
            />
          </div>
        </div>
      </div>
    </div>
  </template>
  
  <script>
  import certifApi from '@/api/certification';
  import LoadingSpinner from '@/components/LoadingSpinner.vue';
  
  export default {
    components: {
      LoadingSpinner
    },
    data() {
      return {
        loading: true,
        error: null,
        certifications: [],
        pagination: {
          current_page: 1,
          last_page: 1,
          total: 0,
          per_page: 10
        },
        showCertificationImageModal: false,
        selectedCertificationImage: ''
      };
    },
  
    methods: {
      async fetchCertifications(page = 1) {
        try {
          this.loading = true;
          const token = sessionStorage.getItem('authToken');
          if (!token) {
            this.error = "Vous devez être connecté pour accéder à cette page";
            this.loading = false;
            return [];
          }
          
          const response = await certifApi.getCertificationBenevole(token, page);
          
          const paginationData = response.data.all_certifications;
          this.certifications = paginationData.data || [];
          this.pagination = {
            current_page: paginationData.current_page,
            last_page: paginationData.last_page,
            total: paginationData.total,
            per_page: paginationData.per_page
          };
          
          return this.certifications;
        } catch (error) {
          console.error('Error fetching certifications:', error);
          this.error = error.response?.data?.message || 'Erreur lors du chargement des certifications';
          return [];
        } finally {
          this.loading = false;
        }
      },
  
      changePage(page) {
        if (page >= 1 && page <= this.pagination.last_page && page !== this.pagination.current_page) {
          this.fetchCertifications(page);
        }
      },
  
      openCertificationImage(imageUrl) {
        if (!imageUrl) return;
        this.selectedCertificationImage = imageUrl;
        this.showCertificationImageModal = true;
      },
      
      formatDate(date) {
        if (!date) return 'N/A';
        const options = { year: "numeric", month: "long", day: "numeric" };
        return new Intl.DateTimeFormat("fr-FR", options).format(new Date(date));
      }
    },
  
    created() {
      this.fetchCertifications();
    }
  };
  </script>