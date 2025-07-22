<template>
    <div class="bg-white rounded-lg shadow-md overflow-hidden" v-for="opportunite in opportunites">
            <img :src="opportunite.image" alt="Éducation" class="w-full h-48 object-cover">
            <div class="p-6">
              <div class="flex justify-between mb-2">
                <span class="bg-[#C93EA1] text-white text-xs px-2 py-1 rounded-full">{{ opportunite.type }}</span>
                <span class="text-gray-500 text-sm">{{ opportunite.ville }}, {{ opportunite.pays }}</span>
              </div>
              <h3 class="text-xl font-bold mb-2 text-[#2D3436]">{{ opportunite.titre }}</h3>
              <div class="mb-4">
                <div class="flex justify-between text-sm mb-1">
                  <span class="font-medium text-gray-700">Engagement requis:</span>
                  <span class="text-gray-600">{{ opportunite.engagement_requis }}</span>
                </div>
                <div class="flex justify-between text-sm">
                  <span class="font-medium text-gray-700">places disponibles:</span>
                  <span class="text-gray-600">{{ opportunite.nb_benevole - opportunite.postules_count }}/{{ opportunite.nb_benevole }}</span>
                </div>
              </div>
               <router-link :to="`/opportunites/${opportunite.id}`" class="bg-[#4ECDC4] hover:bg-[#3BAFA8] text-white text-center py-2 px-4 rounded-full block transition duration-300">Postuler</router-link>
            </div>
          </div>
  </template>
  
  <script>
  import opportuniteApi from '@/api/opportunite';
  
  export default {
    data() {
      return {
        opportunites: [],
      };
    },
    async mounted() {
  try {
    const response = await opportuniteApi.getTop3();
    this.opportunites = response.data.top_opportunites;
    console.log(this.opportunites);  
  } catch (error) {
    console.error('Erreur lors du chargement des opportunités :', error);
  }
}

  }
  </script>
  
  