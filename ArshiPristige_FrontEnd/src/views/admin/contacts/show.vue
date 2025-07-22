<template>
    <div class="min-h-screen bg-[#F8F9FE]">
      <div class="container mx-auto px-4 py-6">
        <div class="flex flex-col space-y-6">
            <div class="bg-white rounded-lg shadow-sm p-6 border border-gray-100">
            <div class="flex flex-col md:flex-row items-center justify-between gap-4">
                <div class="bg-[#00B3AD]/10 rounded-lg p-4 w-full md:w-80 lg:w-90">
                    <div class="flex items-center justify-between">
                    <div>
                    <p class="text-sm text-gray-600">Total des messages</p>
                    <p class="text-2xl font-bold text-gray-900">{{ pagination?.total || 0 }}</p>
                    </div>
                    <div class="h-10 w-10 rounded-full bg-[#00B3AD] flex items-center justify-center">
                    <i class="fas fa-envelope text-white"></i>
                    </div>
                </div>
                </div>
                <button 
                @click="showDeleteConfirmModal = true"
                class="w-full md:w-auto px-4 py-3 md:py-2 bg-red-600 text-white rounded-md hover:bg-red-700 transition-colors flex items-center justify-center md:justify-start"
                >
                <i class="fas fa-trash mr-2"></i> Supprimer tous
                </button>
            </div>
            </div>
          
          <div class="bg-white rounded-lg shadow-sm border border-gray-100 overflow-hidden">
            <div v-if="loading" class="p-10 text-center">
              <div class="inline-block animate-spin rounded-full h-8 w-8 border-t-2 border-b-2 border-[#00B3AD]"></div>
              <p class="mt-2">Chargement...</p>
            </div>
            
            <div v-else-if="error" class="p-10 text-center text-red-500">
              <i class="fas fa-exclamation-circle text-3xl"></i>
              <p class="mt-2">{{ error }}</p>
              <button @click="fetchMessages" class="mt-4 px-4 py-2 bg-[#00B3AD] text-white rounded">
                Réessayer
              </button>
            </div>
            
            <div v-else class="overflow-x-auto">
              <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                  <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Nom</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Email</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Sujet</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Message</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Date</th>
                    <th class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase">Actions</th>
                  </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                  <tr v-if="messages.length === 0">
                    <td colspan="6" class="px-6 py-12 text-center text-gray-500">
                      <i class="fas fa-inbox text-gray-300 text-4xl mb-3"></i>
                      <p>Aucun message trouvé</p>
                    </td>
                  </tr>
                  
                  <tr v-for="msg in messages" :key="msg.id" class="hover:bg-gray-50">
                    <td class="px-6 py-4 whitespace-nowrap">
                      <div class="text-sm font-medium text-gray-900">{{ msg.nom_complet }}</div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                      <div class="text-sm text-gray-900">{{ msg.email }}</div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                      <div class="text-sm text-gray-900">{{ msg.sujet }}</div>
                    </td>
                    <td class="px-6 py-4">
                      <div class="text-sm text-gray-900 truncate max-w-[200px]" :title="msg.message">
                        {{ msg.message }}
                      </div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                      <div class="text-sm text-gray-900">{{ formatDate(msg.created_at) }}</div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-center">
                      <button @click="viewMessage(msg)" class="text-blue-600 hover:text-blue-800">
                        <i class="fas fa-eye"></i>
                      </button>
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
  
            <!-- Pagination -->
            <div v-if="pagination && pagination.last_page > 1" class="border-t border-gray-200 px-6 py-4 flex items-center justify-between">
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
  
      <!-- View Message Modal -->
      <div v-if="showMessageModal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50">
        <div class="bg-white rounded-lg shadow-xl max-w-2xl w-full mx-4 overflow-hidden">
          <div class="bg-gray-100 px-6 py-4 border-b flex justify-between items-center">
            <h3 class="text-lg font-semibold text-gray-900">Détails du message</h3>
            <button @click="showMessageModal = false" class="text-gray-500 hover:text-gray-700">
              <i class="fas fa-times"></i>
            </button>
          </div>
          <div class="p-6" v-if="selectedMessage">
            <div class="mb-4">
              <h4 class="text-sm font-medium text-gray-500">Nom complet</h4>
              <p class="text-gray-900">{{ selectedMessage.nom_complet }}</p>
            </div>
            <div class="mb-4">
              <h4 class="text-sm font-medium text-gray-500">Email</h4>
              <p class="text-gray-900">{{ selectedMessage.email }}</p>
            </div>
            <div class="mb-4">
              <h4 class="text-sm font-medium text-gray-500">Sujet</h4>
              <p class="text-gray-900">{{ selectedMessage.sujet }}</p>
            </div>
            <div class="mb-4">
              <h4 class="text-sm font-medium text-gray-500">Date</h4>
              <p class="text-gray-900">{{ formatDate(selectedMessage.created_at) }}</p>
            </div>
            <div>
              <h4 class="text-sm font-medium text-gray-500 mb-2">Message</h4>
              <div class="bg-gray-50 rounded-lg p-4 border text-gray-900 whitespace-pre-wrap">
                {{ selectedMessage.message }}
              </div>
            </div>
          </div>
          <div class="bg-gray-50 px-6 py-4 flex justify-end">
            <button @click="showMessageModal = false" class="px-4 py-2 bg-gray-200 text-gray-700 rounded-md hover:bg-gray-300">
              Fermer
            </button>
          </div>
        </div>
      </div>
  
      <!-- Delete Confirmation Modal -->
      <div v-if="showDeleteConfirmModal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50">
        <div class="bg-white rounded-lg shadow-xl max-w-md w-full mx-4">
          <div class="p-6">
            <div class="flex items-center justify-center mb-4 text-red-600">
              <i class="fas fa-exclamation-triangle text-4xl"></i>
            </div>
            <h3 class="text-lg font-bold text-gray-900 text-center mb-2">Supprimer tous les messages ?</h3>
            <p class="text-gray-600 text-center">
              Cette action est irréversible et supprimera définitivement tous les messages de contact.
            </p>
          </div>
          <div class="bg-gray-50 px-6 py-4 flex justify-center space-x-4">
            <button 
              @click="showDeleteConfirmModal = false" 
              class="px-4 py-2 border border-gray-300 rounded-md bg-white text-sm font-medium text-gray-700 hover:bg-gray-50">
              Annuler
            </button>
            <button 
              @click="confirmDeleteAll" 
              class="px-4 py-2 bg-red-600 text-white rounded-md hover:bg-red-700 transition-colors">
              Confirmer la suppression
            </button>
          </div>
        </div>
      </div>
    </div>
  </template>
    
  <script>
  import contactApi from '@/api/contact';
  
  export default {
    data() {
      return {
        messages: [],
        pagination: null,
        loading: false,
        error: null,
        currentPage: 1,
        showMessageModal: false,
        showDeleteConfirmModal: false,
        selectedMessage: null
      };
    },
    created() {
      this.fetchMessages();
    },
    methods: {
      async fetchMessages(page = 1) {
        this.loading = true;
        this.error = null;
        
        try {
          const token = sessionStorage.getItem('authToken');
          
          const response = await contactApi.getAllMessages(token);
          const { data, current_page, last_page, total } = response.data.messages;
          
          this.messages = data;
          this.pagination = {
            current_page,
            last_page,
            total
          };
        } catch (error) {
          console.error('Erreur:', error);
          this.error = 'Impossible de récupérer les messages';
        } finally {
          this.loading = false;
        }
      },
      formatDate(dateString) {
        if (!dateString) return 'N/A';
        const date = new Date(dateString);
        return new Intl.DateTimeFormat('fr-FR', { 
          day: '2-digit', 
          month: '2-digit', 
          year: 'numeric'
        }).format(date);
      },
      changePage(page) {
        if (page >= 1 && page <= this.pagination.last_page) {
          this.fetchMessages(page);
        }
      },
      viewMessage(message) {
        this.selectedMessage = message;
        this.showMessageModal = true;
      },
      confirmDeleteAll() {
        this.showDeleteConfirmModal = false;
        this.deleteAllMessages();
      },
      async deleteAllMessages() {
        this.loading = true;
        
        try {
          const token = sessionStorage.getItem('authToken');
          if (!token) {
            this.error = 'Vous devez être connecté pour effectuer cette action';
            return;
          }
          
          await contactApi.deleteAllMessages(token);
          
          this.fetchMessages(1);
        } catch (error) {
          console.error('Erreur lors de la suppression:', error);
          this.error = 'Impossible de supprimer les messages';
        } finally {
          this.loading = false;
        }
      }
    }
  };
  </script>