<template>
    <section class="min-h-screen bg-gray-50">
        <div class="bg-gradient-to-br from-[#4ECDC4]/10 to-white pt-6 pb-8 md:pt-8 md:pb-12">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="bg-white p-6 rounded-2xl shadow-xl border border-gray-100">
                    <h1 class="text-2xl md:text-3xl font-bold text-gray-900 mb-6 text-center">
                        Trouvez votre mission de bénévolat idéale
                    </h1>
                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-7 gap-4">
                        <div class="relative lg:col-span-3 group">
                            <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                <svg class="h-5 w-5 text-[#4ECDC4] group-hover:text-[#3BAFA8] transition-colors duration-200" fill="none" stroke="currentColor" viewbox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                                </svg>
                            </div>
                            <input v-model="searchTitre" 
                                type="text" 
                                class="block w-full pl-12 pr-4 py-3.5 border border-gray-200 rounded-xl bg-gray-50 text-gray-700 placeholder-gray-400 focus:outline-none focus:border-[#4ECDC4] focus:ring-2 focus:ring-[#4ECDC4]/20 transition-all duration-200" 
                                placeholder="Quelle mission vous intéresse ?"
                            >
                        </div>
    
                        <div class="relative lg:col-span-2 group">
                            <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                <svg class="h-5 w-5 text-[#4ECDC4] group-hover:text-[#3BAFA8] transition-colors duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                </svg>
                            </div>
                            <input v-model="searchVille" 
                                type="text" 
                                class="block w-full pl-12 pr-4 py-3.5 border border-gray-200 rounded-xl bg-gray-50 text-gray-700 placeholder-gray-400 focus:outline-none focus:border-[#4ECDC4] focus:ring-2 focus:ring-[#4ECDC4]/20 transition-all duration-200" 
                                placeholder="Où ?"
                            >
                        </div>
        
                        <button class="lg:col-span-2 flex justify-center items-center px-6 py-3.5 bg-[#4ECDC4] hover:bg-[#3BAFA8] text-white rounded-xl font-medium transition-all duration-200 transform hover:scale-[1.02] hover:shadow-lg group" 
                                @click="searchOpportunities">
                            <span>Rechercher</span>
                            <svg class="ml-2 h-5 w-5 transform transition-transform group-hover:translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                            </svg>
                        </button>
                    </div>
                </div>
        
                <div class="mt-8 grid grid-cols-1 md:grid-cols-4 gap-6">
                    <div class="hidden md:block space-y-6">
                        <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-200">
                            <h3 class="text-lg font-semibold text-gray-900 mb-4">Filtres</h3>
                            <div class="space-y-3">
                                <label v-for="filter in filters" :key="filter.value" class="flex items-center p-2 hover:bg-gray-50 rounded-lg cursor-pointer">
                                    <input type="checkbox" v-model="activeFilters" :value="filter.value" class="form-checkbox rounded text-orange-400 focus:ring-orange-400" @change="searchOpportunities">
                                    <span class="text-gray-700 ml-3">{{ filter.label }}</span>
                                </label>
                            </div>
                        </div>
                    </div>
                    
                    <div class="md:col-span-3">
                        <div class="flex justify-between items-center mb-6">
                            <h2 class="text-xl font-bold text-gray-900">
                                {{ totalOpportunities }} opportunités trouvées
                            </h2>
                            <select v-model="sortValue" class="border border-gray-200 rounded-lg px-4 py-2 bg-white focus:outline-none focus:border-[#4ECDC4] text-sm" @change="handleSortChange">
                                <option value="recent">Les plus récents</option>
                                <option value="popular">Les plus populaires</option>
                            </select>
                        </div>
                        
                        <div v-if="isLoading" class="flex items-center justify-center h-80">
                            <LoadingSpinner />
                        </div>
                        
                        <div v-else-if="opportunities.length === 0" class="flex items-center justify-center h-80">
                            <div class="bg-white p-6 rounded-xl shadow-md border border-gray-200 text-center max-w-md">
                                <div class="text-red-500 mb-4 sm:mb-6">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 mx-auto" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18.364 5.636a9 9 0 11-12.728 0 9 9 0 0112.728 0zM12 8v4m0 4h.01" />
                                    </svg>
                                </div>
                                <h2 class="text-xl font-semibold text-gray-700 mb-2">Aucune opportunité trouvée</h2>
                                <p class="text-gray-500">Essayez de modifier les filtres ou les critères de recherche pour obtenir de meilleurs résultats.</p>
                            </div>
                        </div>
                        
                        <div v-else class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
                            
                            <div 
                                v-for="opportunite in opportunities" 
                                :key="opportunite.id" 
                                class="relative bg-white rounded-2xl shadow-lg overflow-hidden group hover:shadow-2xl transition-shadow duration-300"
                            >
                                <router-link :to="`/opportunites/${opportunite.id}`">
                                    <div class="relative">
                                        <img 
                                            :src="opportunite.image" 
                                            alt="Image" 
                                            class="w-full h-56 object-cover"
                                        >
                                        <div class="absolute top-4 left-4 bg-[#4ECDC4] text-white text-xs font-medium px-3 py-1 rounded-full shadow-md">
                                            {{ opportunite.categorie.nom }}
                                        </div>
                                    </div>

                                    <div class="p-6">
                                        <div class="flex items-center text-sm text-gray-500 mb-3">
                                            <svg 
                                                class="w-5 h-5 text-[#4ECDC4] mr-2" 
                                                fill="none" 
                                                stroke="currentColor" 
                                                stroke-width="2" 
                                                viewBox="0 0 24 24"
                                            >
                                                <path 
                                                    stroke-linecap="round" 
                                                    stroke-linejoin="round" 
                                                    d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"
                                                />
                                            </svg>
                                            <span>{{ opportunite.ville }}, {{ opportunite.pays }}</span>
                                        </div>

                                        <h3 
                                            class="text-lg font-bold text-gray-900 mb-4 group-hover:text-[#4ECDC4] transition-colors duration-300"
                                        >
                                            {{ opportunite.titre }}
                                        </h3>

                                        <div class="grid grid-cols-2 gap-4 text-sm text-gray-600 mb-4">
                                            <div class="flex flex-col">
                                                <span class="text-gray-500">Durée:</span>
                                                <span class="text-gray-900 font-medium">{{ opportunite.duree }}</span>
                                            </div>
                                            <div class="flex flex-col">
                                                <span class="text-gray-500">Places:</span>
                                                <span class="text-gray-900 font-medium">
                                                    {{ getAvailablePlaces(opportunite) }}/{{ opportunite.nb_benevole }}
                                                </span>
                                            </div>
                                        </div>

                                        <div class="flex items-center text-sm text-gray-500">
                                            <svg 
                                                class="w-5 h-5 text-[#4ECDC4] mr-2" 
                                                fill="none" 
                                                stroke="currentColor" 
                                                stroke-width="2" 
                                                viewBox="0 0 24 24"
                                            >
                                                <path 
                                                    stroke-linecap="round" 
                                                    stroke-linejoin="round" 
                                                    d="M8 7V3m8 4V3m-9 9h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"
                                                />
                                            </svg>
                                            <span>Date limite: 
                                                <span class="text-gray-900 font-medium">{{ formatDate(opportunite.derniere_date_postule) }}</span>
                                            </span>
                                        </div>
                                    </div>
                                </router-link>
                            </div>
                        </div>
                    
                        <div v-if="!isLoading && opportunities.length > 0" class="mt-8 flex justify-center">
                            <nav class="flex items-center space-x-2">
                                <button 
                                    class="p-2 rounded-lg border border-gray-200 text-gray-500 hover:border-[#4ECDC4] hover:text-[#4ECDC4]"
                                    @click="changePage(currentPage - 1)"
                                    :disabled="currentPage === 1"
                                >
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
                                    </svg>
                                </button>
                                <button 
                                    v-for="page in totalPages" 
                                    :key="page" 
                                    class="px-4 py-2 rounded-lg border border-gray-200 hover:border-[#4ECDC4] hover:text-[#4ECDC4]"
                                    :class="{'bg-[#4ECDC4] text-white': currentPage === page}"
                                    @click="changePage(page)"
                                >
                                    {{ page }}
                                </button>
                                <button 
                                    class="p-2 rounded-lg border border-gray-200 text-gray-500 hover:border-[#4ECDC4] hover:text-[#4ECDC4]"
                                    @click="changePage(currentPage + 1)"
                                    :disabled="currentPage === totalPages"
                                >
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                                    </svg>
                                </button>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
     
    </section>
</template>

<script>
import opportuniteApi from "@/api/opportunite";
import LoadingSpinner from "@/components/LoadingSpinner.vue";

export default {
    components: {
        LoadingSpinner,
    },
    data() {
        return {
            opportunities: [],
            totalOpportunities: 0,
            currentPage: 1,
            totalPages: 1,
            searchTitre: '',
            searchVille: '',
            activeFilters: [], 
            sortValue: 'recent',
            filters: [
                { label: "🌍 Social", value: "Social" },
                { label: "🌱 Environnement", value: "Environnement" },
                { label: "🏥 Santé", value: "Santé" },
                { label: "🎓 Éducation", value: "Éducation" },
                { label: "🎭 Culture", value: "Culture" },
                { label: "⚽ Sport", value: "Sport" },
                { label: "💻 Technologie", value: "Technologie" },
                { label: "💰 Économie", value: "Économie" },
                { label: "❓ Autre", value: "Autre" },
            ],
            isLoading: true,
        };
    },
    async mounted() {
        await this.fetchOpportunities(); 
    },
    methods: {
        async fetchOpportunities() {
            try {
                const response = await opportuniteApi.getAll(this.currentPage); 
                this.opportunities = response.data.data || [];
                this.totalOpportunities = response.data.total || 0;
                this.totalPages = response.data.last_page || 1;
            } catch (error) {
                console.error("Erreur lors du chargement des opportunités :", error);
            } finally {
                this.isLoading = false;
            }
        },
        async handleSortChange(event) {
            this.sortValue = event.target.value;
            await this.searchOpportunities();
        },
        async searchOpportunities() {   
            this.isLoading = true;
            try {
                const response = await opportuniteApi.searchOpportunites(this.searchVille, this.searchTitre, this.activeFilters, this.sortValue);
                this.opportunities = response.data.data || [];
                this.totalOpportunities = response.data.total || 0;
                this.totalPages = response.data.last_page || 1;
            } catch (error) {
                console.error("Erreur lors de la recherche des opportunités :", error);
            } finally {
                this.isLoading = false;
            }
        },
        changePage(page) {
            if (page >= 1 && page <= this.totalPages) {
                this.currentPage = page;
                this.fetchOpportunities();
            }
        },
        formatDate(date) {
            const options = { year: "numeric", month: "long", day: "numeric" };
            return new Intl.DateTimeFormat("fr-FR", options).format(new Date(date));
        },
        getAvailablePlaces(opportunite) {
            const availablePlaces = opportunite.nb_benevole - opportunite.postules_count;
            return availablePlaces < 1 ? 0 : availablePlaces;
        }
    },
};
</script>