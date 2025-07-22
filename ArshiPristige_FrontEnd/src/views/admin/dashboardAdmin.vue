<template>
  <div class="min-h-screen bg-[#F8F9FE]">
    <div v-if="loading" class="min-h-[calc(100vh-160px)] bg-[#F8F9FE] flex items-center justify-center">
      <LoadingSpinner />
    </div>
    
    <div v-else class="container mx-auto px-4 py-8">
      <div class="max-w-7xl mx-auto">
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 mb-6">
          <div class="bg-white rounded-lg shadow-sm p-6 border border-gray-100">
            <div class="flex items-center justify-between mb-2">
              <h3 class="text-gray-600 text-sm font-medium">Opportunités</h3>
              <div class="h-10 w-10 rounded-lg bg-blue-100 flex items-center justify-center">
                <i class="fas fa-bullhorn text-blue-500"></i>
              </div>
            </div>
            <p class="text-2xl font-bold text-gray-900">{{ totalOpportunites }}</p>
            <div class="mt-2 text-sm">
              <span class="text-green-500">{{ stats.opportuniteStatistics?.activeOpportunites || 0 }} actives</span>,
              <span class="text-amber-500">{{ stats.opportuniteStatistics?.pendingOpportunites || 0 }} en attente</span>,
              <span class="text-gray-500">{{ stats.opportuniteStatistics?.closedOpportunites || 0 }} fermées</span>
            </div>
          </div>
          
          <div class="bg-white rounded-lg shadow-sm p-6 border border-gray-100">
            <div class="flex items-center justify-between mb-2">
              <h3 class="text-gray-600 text-sm font-medium">Associations</h3>
              <div class="h-10 w-10 rounded-lg bg-purple-100 flex items-center justify-center">
                <i class="fas fa-users text-purple-500"></i>
              </div>
            </div>
            <p class="text-2xl font-bold text-gray-900">{{ stats.associationStatistics?.totalAssociations || 0 }}</p>
            <div class="mt-2 text-sm">
              <span class="text-green-500">{{ stats.associationStatistics?.acceptedAssociations || 0 }} acceptées</span>,
              <span class="text-amber-500">{{ stats.associationStatistics?.pendingAssociations || 0 }} en attente</span>,
              <span class="text-red-500">{{ stats.associationStatistics?.refusedAssociations || 0 }} refusées</span>
            </div>
          </div>
          
          <div class="bg-white rounded-lg shadow-sm p-6 border border-gray-100">
            <div class="flex items-center justify-between mb-2">
              <h3 class="text-gray-600 text-sm font-medium">Benevoles</h3>
              <div class="h-10 w-10 rounded-lg bg-amber-100 flex items-center justify-center">
                <i class="fas fa-certificate text-amber-500"></i>
              </div>
            </div>
            <p class="text-2xl font-bold text-gray-900">{{ stats.benevolesStatistics?.totalBenevoles || 0 }}</p>
            <div class="mt-2 text-sm text-gray-500">
              avec {{ stats.benevolesStatistics?.totalPostules || 0 }} postulations
            </div>
          </div>
          
          <div class="bg-white rounded-lg shadow-sm p-6 border border-gray-100">
            <div class="flex items-center justify-between mb-2">
              <h3 class="text-gray-600 text-sm font-medium">Taux de réussite</h3>
              <div class="h-10 w-10 rounded-lg bg-green-100 flex items-center justify-center">
                <i class="fas fa-chart-line text-green-500"></i>
              </div>
            </div>
            <p class="text-2xl font-bold text-gray-900">{{ Math.round(stats.additionalStatistics?.successRate || 0) }}%</p>
            <div class="mt-2 text-sm text-gray-500">
              candidatures acceptées / total
            </div>
          </div>
        </div>
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
          <div class="lg:col-span-2 space-y-8">
            <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6">
              <div class="flex items-center justify-between mb-6">
                <div class="flex items-center space-x-3">
                  <i class="fas fa-star text-[#C9559B] text-xl"></i>
                  <h2 class="text-xl font-semibold text-gray-900">Opportunités populaires</h2>
                </div>
                <router-link to="/dashboard/opportunites" class="text-sm text-[#00B3AD] hover:underline flex items-center">
                  Voir tout <i class="fas fa-chevron-right ml-1"></i>
                </router-link>
              </div>
              
              <div v-if="!stats.additionalStatistics?.mostPopularOpportunites || stats.additionalStatistics?.mostPopularOpportunites.length === 0" class="flex flex-col items-center justify-center py-8 bg-gray-50 rounded-lg">
                <i class="fas fa-calendar-times text-[#C9559B] text-3xl mb-3"></i>
                <p class="text-gray-500">Aucune opportunité pour le moment</p>
              </div>
              
              <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-5">
                <div 
                  v-for="opp in stats.additionalStatistics?.mostPopularOpportunites || []" 
                  :key="opp.id" 
                  class="group relative bg-white rounded-xl shadow-md overflow-hidden transform transition-all duration-300 hover:-translate-y-1 hover:shadow-xl border border-gray-100"
                >
                  <div class="relative h-40 overflow-hidden">
                    <img 
                      :src="opp.image" 
                      :alt="opp.titre"
                      class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105"/>
                    <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent"></div>
                    
                    <div class="absolute top-3 right-3">
                      <span class="bg-gray-100 text-gray-800 px-3 py-1 text-xs font-semibold rounded-full shadow-sm">
                        {{ opp.postules_count }} candidatures
                      </span>
                    </div>
                    
                    <h3 class="absolute bottom-3 left-3 right-3 text-white font-semibold line-clamp-2 text-shadow">
                      {{ opp.titre }}
                    </h3>
                  </div>
                  
                  <div class="p-4 bg-white">
                    <div class="flex items-center justify-between text-sm">
                      <div class="flex items-center text-gray-600">
                        <i class="fas fa-calendar-alt text-[#C9559B] mr-2"></i>
                        <span>{{ formatDate(opp.date) || 'Non spécifié' }}</span>
                      </div>
                      
                      <div class="flex items-center text-gray-600">
                        <i class="fas fa-map-marker-alt text-[#C9559B] mr-2"></i>
                        <span>{{ opp.ville || 'Non spécifié' }}</span>
                      </div>
                    </div>
                    
                    <div class="mt-3 text-center">
                      <router-link :to="`opportunites/${opp.id}`" class="block w-full py-2 px-4 bg-[#00B3AD]/10 hover:bg-[#00B3AD]/20 text-[#00B3AD] font-medium rounded-lg transition-all duration-200 text-sm">
                        Voir les détails
                      </router-link>
                    </div>
                  </div>
                </div>
              </div>
           </div>
            
            <div class="bg-white rounded-xl shadow-md border border-gray-100 p-6 transform transition-all duration-200 hover:shadow-lg">
              <div class="flex items-center justify-between mb-6">
                <h2 class="text-xl font-bold text-gray-900">Candidatures récentes</h2>
                <router-link to="/dashboard/benevoles" class="text-sm text-blue-600 hover:underline flex items-center">
                  Tout voir <i class="fas fa-arrow-right ml-1"></i>
                </router-link>
              </div>
              
              <div class="overflow-x-auto">
                <table class="min-w-full">
                  <thead>
                    <tr class="border-b border-gray-200">
                      <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Bénévole</th>
                      <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Opportunité</th>
                      <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Date</th>
                      <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Statut</th>
                    </tr>
                  </thead>
                  <tbody class="divide-y divide-gray-200">
                    <tr v-for="(benevole, index) in stats.last4Benevoles || []" :key="index" class="hover:bg-gray-50">
                      <td class="px-4 py-3">
                        <div class="flex items-center">
                          <div class="h-10 w-10 rounded-full overflow-hidden bg-gray-100">
                            <img :src="benevole.image" class="h-full w-full object-cover" :alt="benevole.prenom" />
                          </div>
                          <div class="ml-3">
                            <div class="text-sm font-medium text-gray-900">{{ benevole.prenom }} {{ benevole.nom }}</div>
                            <div class="text-xs text-gray-500">{{ benevole.email }}</div>
                          </div>
                        </div>
                      </td>
                      <td class="px-4 py-3 text-sm">{{ benevole.opportunite_nom }}</td>
                      <td class="px-4 py-3 text-sm text-gray-500">{{ formatDate(benevole.date_postule) }}</td>
                      <td class="px-4 py-3">
                        <span :class="getStatusClass(benevole.etat_postule)" class="px-3 py-1 text-xs rounded-full">
                          {{ benevole.etat_postule }}
                        </span>
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
          
          <div class="space-y-8">
            <div class="bg-white rounded-xl shadow-md border border-gray-100 p-6 transform transition-all duration-200 hover:shadow-lg">
              <div class="flex items-center justify-between mb-6">
                <h2 class="text-xl font-bold text-gray-900">Top Bénévoles</h2>
                <router-link to="/dashboard/benevoles" class="text-sm text-blue-600 hover:underline flex items-center">
                  Tous les bénévoles <i class="fas fa-arrow-right ml-1"></i>
                </router-link>
              </div>
              
              <div class="space-y-4">
                <div v-for="(benevole, index) in stats.additionalStatistics?.topBenevoles || []" :key="index" 
                     class="flex items-center p-3 hover:bg-gray-50 rounded-lg transition-colors">
                  <div class="w-12 h-12 rounded-full overflow-hidden bg-gray-100">
                    <img :src="benevole.image" class="h-full w-full object-cover" :alt="benevole.prenom" />
                  </div>
                  <div class="ml-4 flex-1">
                    <div class="text-sm font-medium text-gray-900">{{ benevole.prenom }} {{ benevole.nom }}</div>
                    <div class="flex items-center mt-1">
                      <div class="text-xs text-gray-500">{{ benevole.postules_count }} participations</div>
                      <div v-if="index === 0" class="ml-2 text-amber-500">
                        <i class="fas fa-trophy"></i>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            

            <div class="bg-white rounded-xl shadow-md border border-gray-100 p-6 transform transition-all duration-200 hover:shadow-lg">
              <h2 class="text-xl font-bold text-gray-900 mb-4">Tâches en attente</h2>
              
              <div class="space-y-3">
                <div class="flex items-center p-3 bg-yellow-50 border border-yellow-200 rounded-lg">
                  <div class="h-9 w-9 rounded-full bg-yellow-100 flex items-center justify-center">
                    <i class="fas fa-bell text-yellow-500"></i>
                  </div>
                  <div class="ml-3">
                    <p class="text-sm font-medium text-gray-800">
                      {{ stats.postuleStatistics?.pendingCandidatures || 0 }} candidatures à examiner
                    </p>
                  </div>
                </div>
                
                <div class="flex items-center p-3 bg-blue-50 border border-blue-200 rounded-lg">
                  <div class="h-9 w-9 rounded-full bg-blue-100 flex items-center justify-center">
                    <i class="fas fa-clipboard-check text-blue-500"></i>
                  </div>
                  <div class="ml-3">
                    <p class="text-sm font-medium text-gray-800">
                      {{ stats.additionalStatistics?.pendingTasks || 0 }} opportunités en attente
                    </p>
                  </div>
                </div>
                
                <div class="flex items-center p-3 bg-green-50 border border-green-200 rounded-lg">
                  <div class="h-9 w-9 rounded-full bg-green-100 flex items-center justify-center">
                    <i class="fas fa-certificate text-green-500"></i>
                  </div>
                  <div class="ml-3">
                    <p class="text-sm font-medium text-gray-800">
                      {{ certificatesToGive }} certificats à délivrer
                    </p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import LoadingSpinner from "@/components/LoadingSpinner.vue";
import statistiquesApi from '@/api/statistiques';

export default {
  components: {
    LoadingSpinner
  },
  data() {
    return {
      loading: true,
      stats: {},
    };
  },
  computed: {
    totalOpportunites() {
      const stats = this.stats.opportuniteStatistics || {};
      return (stats.activeOpportunites || 0) + 
             (stats.pendingOpportunites || 0) + 
             (stats.closedOpportunites || 0);
    },
    certificatesToGive() {
      const accepted = this.stats.postuleStatistics?.acceptedCandidatures || 0;
      const given = this.stats.certificationStatistics?.totalCertificationsGiven || 0;
      return Math.max(0, accepted - given);
    }
  },
  methods: {
    async fetchStats() {
      try {
        const token = sessionStorage.getItem('authToken');
        const response = await statistiquesApi.getAdminStatistics(token);
        this.stats = response.data;
      } catch (error) {
        console.error('Erreur:', error);
      } finally {
        this.loading = false;
      }
    },

    
    
    formatDate(date) {
      if (!date) return '';
      const options = { year: 'numeric', month: 'short', day: 'numeric' };
      return new Date(date).toLocaleDateString('fr-FR', options);
    },
    
    getStatusClass(status) {
      if (status === 'accepté') return 'bg-green-100 text-green-800';
      if (status === 'en attente') return 'bg-yellow-100 text-yellow-800';
      if (status === 'refusé') return 'bg-red-100 text-red-800';
      return 'bg-gray-100 text-gray-800';
    },
    
    getColorClass(index) {
      const colors = [
        'bg-blue-500', 
        'bg-purple-500', 
        'bg-green-500', 
        'bg-amber-500', 
        'bg-pink-500'
      ];
      return colors[index % colors.length];
    },
  },
  mounted() {
    this.fetchStats();
  }
};
</script>

