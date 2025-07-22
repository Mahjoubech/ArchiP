<template>
    <div v-if="isLoading" class="bg-gray-50 min-h-screen flex items-center justify-center py-8">
      <div class="flex flex-col items-center">
        <LoadingSpinner />
      </div>
    </div>
    
    <ErrorComponent v-else-if="error" :message="error" />
    
    <div class="bg-gray-50 min-h-screen py-8" v-else-if="opportunite">
      <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <nav class="flex mb-8" aria-label="Breadcrumb">
          <ol class="flex items-center space-x-2">
            <li>
              <router-link :to="`/`" class="text-gray-500 hover:text-[#4ECDC4]">Accueil</router-link>
            </li>
            <li>
              <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
              </svg>
            </li>
            <li>
              <router-link :to="`/opportunites`" class="text-gray-500 hover:text-[#4ECDC4]">Opportunités</router-link>
            </li>
            <li>
              <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
              </svg>
            </li>
            <li>
              <span class="text-gray-900">{{ opportunite.titre }}</span>
            </li>
          </ol>
        </nav>
        
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
          <div class="lg:col-span-2 space-y-6">
            <div class="bg-white rounded-2xl shadow-sm overflow-hidden">
              <div class="relative">
                <img :src="opportunite.image" alt="Accompagnement de personnes âgées" class="w-full h-[400px] object-cover">
                <div class="absolute top-4 left-4 flex space-x-2">
                  <span class="bg-[#4ECDC4] text-white px-3 py-1 rounded-full text-sm">
                    {{ opportunite.categorie.nom }}
                  </span>
                  <span class="bg-white/90 text-gray-700 px-3 py-1 rounded-full text-sm backdrop-blur-sm">
                    🕒 {{ opportunite.duree }}
                  </span>
                </div>
              </div>
              
              <div class="p-6">
                <h1 class="text-2xl font-bold text-gray-900 mb-4">
                  {{ opportunite.titre }}
                </h1>
                <div class="flex items-center space-x-4 mb-6">
                  <div class="flex items-center">
                    <svg class="w-5 h-5 text-[#4ECDC4] mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                    </svg>
                    <span class="text-gray-600">{{ opportunite.ville }}, {{ opportunite.pays }}</span>
                  </div>
                  <div class="flex items-center">
                    <svg class="w-5 h-5 text-[#4ECDC4] mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                    <span class="text-gray-600">Places: {{ getAvailablePlaces(opportunite) }}/{{ opportunite.nb_benevole }} disponibles</span>
                  </div>
                </div>
                
                <div class="prose max-w-none">
                  <h2 class="text-xl font-semibold mb-3">Description</h2>
                  <p class="text-gray-600 mb-4">
                    {{ opportunite.description }}
                  </p>
                  
                  <h3 class="text-lg font-semibold mb-2">Missions principales:</h3>
                  <ul class="list-disc pl-5 mb-4 text-gray-600">
                    {{ opportunite.missions_principales }}
                  </ul>
  
                  <h3 class="text-lg font-semibold mb-2">Compétences recherchées:</h3>
                  <ul class="list-disc pl-5 mb-4 text-gray-600">
                    {{ opportunite.competences }}
                  </ul>
                </div>
              </div>
            </div>
  
            <div class="bg-white rounded-2xl shadow-sm p-6">
              <h2 class="text-xl font-semibold mb-4">À propos de l'association</h2>
              <div class="flex items-center space-x-4">
                <img :src="opportunite.association.logo" alt="Logo Association" class="w-16 h-16 rounded-full">
                <div>
                  <h3 class="font-semibold text-gray-900">{{ opportunite.association.nom_association }}</h3>
                  <p class="text-gray-600 text-sm">{{ opportunite.association.fonction_occupee }}</p>
                </div>
              </div>
            </div>
          </div>
  
          <div class="space-y-6">
            <div class="bg-white rounded-2xl shadow-sm p-6">
              <h2 class="text-xl font-semibold mb-4">Postuler à cette mission</h2>
              <div class="space-y-4">
                <div class="flex justify-between text-sm border-b pb-4">
                  <span class="text-gray-600">Engagement requis:</span>
                  <span class="font-medium">{{ opportunite.engagement_requis }}</span>
                </div>
                <div class="flex justify-between text-sm border-b pb-4">
                  <span class="text-gray-600">Durée:</span>
                  <span class="font-medium">{{ opportunite.duree }}</span>
                </div>
                <div class="flex justify-between text-sm border-b pb-4">
                  <span class="text-gray-600">Places disponibles:</span>
                  <span class="font-medium">{{ getAvailablePlaces(opportunite) }}/{{ opportunite.nb_benevole }}</span>
                </div>
                <div class="flex justify-between text-sm pb-4">
                  <span class="text-gray-600">Début de la mission:</span>
                  <span class="font-medium">{{ opportunite.date }}</span>
                </div>
                <div v-if="authStore.role === 'benevole'">
                <div v-if="alreadyApplied" class="my-3 p-3 rounded-lg bg-green-100 text-green-800">
                  Vous avez déjà postulé pour cette opportunité
                </div>
                
                <div v-else-if="postulationMessage" class="my-3 p-3 rounded-lg" :class="isSuccess ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800'">
                  {{ postulationMessage }}
                </div>
                
                <button 
                  @click="postuler" 
                  class="w-full bg-[#4ECDC4] text-white py-3 rounded-xl font-medium hover:bg-[#3BAFA8] transition-all duration-200 flex items-center justify-center space-x-2"
                  :disabled="submitting || alreadyApplied"
                  :class="{'opacity-50 cursor-not-allowed': submitting || alreadyApplied}"
                >
                  <span v-if="submitting">Traitement en cours...</span>
                  <span v-else-if="alreadyApplied">Déjà postulé</span>
                  <span v-else>Postuler maintenant</span>
                  <svg v-if="!submitting && !alreadyApplied" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/>
                  </svg>
                </button>
              </div>
            </div>
            </div>
            <div class="bg-white rounded-2xl shadow-sm p-6">
            <h2 class="text-lg font-semibold mb-4">Localisation</h2>
            <div class="relative w-full rounded-xl overflow-hidden mb-4">
              <iframe 
                width="100%" 
                height="200" 
                frameborder="0" 
                scrolling="no" 
                marginheight="0" 
                marginwidth="0" 
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3323.846981223989!2d-7.632349684395466!3d33.592031880733895!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zMzPCsDM1JzMxLjMiTiA3wrAzNyc1Ni41Ilc!5e0!3m2!1sfr!2sma!4v1635789012345!5m2!1sfr!2sma" 
                class="rounded-xl"
                style="border: 1px solid #ddd;"
              ></iframe>
            </div>
            <address class="text-gray-600 not-italic">
              <div class="flex items-start space-x-2">
                <svg class="w-5 h-5 text-[#4ECDC4] mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                </svg>
                <div>
                  {{ opportunite.adresse }}
                </div>
              </div>
            </address>
          </div>

          <div class="bg-white rounded-2xl shadow-sm p-6">
            <h2 class="text-lg font-semibold mb-4">Partager</h2>
            <div class="flex space-x-3">
              <button @click="shareOnFacebook" class="flex-1 flex items-center justify-center space-x-2 py-2 border rounded-lg hover:bg-gray-50 transition-colors duration-200">
                <svg class="w-5 h-5 text-blue-500" fill="currentColor" viewBox="0 0 24 24">
                  <path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/>
                </svg>
                <span class="text-sm text-gray-600">Facebook</span>
              </button>
              <button @click="shareOnTwitter" class="flex-1 flex items-center justify-center space-x-2 py-2 border rounded-lg hover:bg-gray-50 transition-colors duration-200">
                <svg class="w-5 h-5 text-blue-400" fill="currentColor" viewBox="0 0 24 24">
                  <path d="M23.953 4.57a10 10 0 01-2.825.775 4.958 4.958 0 002.163-2.723c-.951.555-2.005.959-3.127 1.184a4.92 4.92 0 00-8.384 4.482C7.69 8.095 4.067 6.13 1.64 3.162a4.822 4.822 0 00-.666 2.475c0 1.71.87 3.213 2.188 4.096a4.904 4.904 0 01-2.228-.616v.06a4.923 4.923 0 003.946 4.827 4.996 4.996 0 01-2.212.085 4.936 4.936 0 004.604 3.417 9.867 9.867 0 01-6.102 2.105c-.39 0-.779-.023-1.17-.067a13.995 13.995 0 007.557 2.209c9.053 0 13.998-7.496 13.998-13.985 0-.21 0-.42-.015-.63A9.935 9.935 0 0024 4.59z"/>
                </svg>
                <span class="text-sm text-gray-600">Twitter</span>
              </button>
              <button @click="shareOnLinkedIn" class="flex-1 flex items-center justify-center space-x-2 py-2 border rounded-lg hover:bg-gray-50 transition-colors duration-200">
                <svg class="w-5 h-5 text-blue-600" fill="currentColor" viewBox="0 0 24 24">
                  <path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433c-1.144 0-2.063-.926-2.063-2.065 0-1.138.92-2.063 2.063-2.063 1.14 0 2.064.925 2.064 2.063 0 1.139-.925 2.065-2.064 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z"/>
                </svg>
                <span class="text-sm text-gray-600">LinkedIn</span>
              </button>
            </div>
          </div>

          <div class="bg-white rounded-2xl shadow-sm p-6">
            <h2 class="text-lg font-semibold mb-4">Opportunités similaires</h2>
            <div class="space-y-4">
              <a v-for="similar in similarOpportunites" 
                 :key="similar.id" 
                 :href="`/opportunites/${similar.id}`" 
                 class="block group">
                <div class="flex space-x-4">
                  <img :src="similar.image" 
                       :alt="similar.titre" 
                       class="w-20 h-20 rounded-lg object-cover">
                  <div>
                    <h3 class="font-medium text-gray-900 group-hover:text-[#4ECDC4] transition-colors duration-200">
                      {{ similar.titre }}
                    </h3>
                    <p class="text-sm text-gray-600">{{ similar.ville }}, {{ similar.pays }}</p>
                    <span class="text-xs text-[#4ECDC4]">{{ similar.engagement_requis }}</span>
                  </div>
                </div>
              </a>
              <p v-if="similarOpportunites.length === 0" class="text-gray-600 text-sm">
                Aucune opportunité similaire disponible pour le moment.
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  </template>
  
  <script>
  import opportuniteApi from "@/api/opportunite";
  import postulationApi from "@/api/postulation";
  import ErrorComponent from "@/components/erreur.vue";
  import LoadingSpinner from "@/components/LoadingSpinner.vue";
  import { authStore } from "@/stores/auth";

  export default {
    components: {
      ErrorComponent,
      LoadingSpinner
    },
    props: {
      id: {
        type: String,
        required: true,
      },
    },
    data() {
      return {
        isLoading: true, 
        opportunite: null,
        similarOpportunites: [],  
        error: null,
        authStore,
        submitting: false,
        alreadyApplied: false,
        postulationMessage: null,
        isSuccess: false,
      };
    },
    methods: {
      shareOnFacebook() {
        const url = window.location.href;
        window.location.href = `https://www.facebook.com/share.php?u=${url}`;
      },
      shareOnLinkedIn() {
        const url = window.location.href;
        window.location.href = `https://www.linkedin.com/sharing/share-offsite/?url=${url}`;
      },
      shareOnTwitter() {
        const url = window.location.href;
        window.location.href = `https://twitter.com/intent/tweet?url=${url}`;
      },
      
      getAvailablePlaces(opportunite) {
        const availablePlaces = opportunite.nb_benevole - opportunite.postules_count;
        return availablePlaces < 1 ? 0 : availablePlaces;
      },
      
      async postuler() {
        if (this.submitting || this.alreadyApplied) return;
        
        this.submitting = true;
        this.postulationMessage = null;
        
        try {
          const token = sessionStorage.getItem('authToken');
          
          if (!token) {
            this.$router.push('/login?redirect=' + encodeURIComponent(this.$route.fullPath));
            return;
          }
          
          const response = await postulationApi.addPostulation(token, this.id);
          this.postulationMessage = response.data.message;
          this.isSuccess = true;
          this.alreadyApplied = true;
        } catch (error) {
          console.error("Error applying:", error);
          this.isSuccess = false;
          
          if (error.response && error.response.data && error.response.data.message) {
            this.postulationMessage = error.response.data.message;
            
            if (error.response.data.message.includes("déjà postulé")) {
              this.alreadyApplied = true;
            }
          } else {
            this.postulationMessage = "Une erreur est survenue lors de la postulation. Veuillez réessayer plus tard.";
          }
        } finally {
          this.submitting = false;
        }
      },
      
      async fetchApplicationStatus() {
        try {
          console.log("Checking application status for opportunity ID:", this.id);
          const token = sessionStorage.getItem('authToken');
          
          if (!token) {
            console.log("No token available, can't check application status");
            return false;
          }
          
          const response = await postulationApi.checkIfAlreadyApplied(token, this.id);
          console.log("Application status response:", response.data);
          
          if (response.data === true || response.data === "true") {
            return true;
          } else if (typeof response.data === 'object' && response.data.applied) {
            return true;
          } else if (typeof response.data === 'object' && response.data.alreadyApplied) {
            return true;
          } else if (response.data === 1 || response.data === "1") {
            return true;
          }
          
          return false;
        } catch (error) {
          console.error("Error checking application status:", error);
          return false;
        }
      }
    },
    
    async created() {
      console.log("Component created, ID:", this.id);
      this.isLoading = true;
      
      try {
        this.alreadyApplied = await this.fetchApplicationStatus();
        console.log("Application status check result:", this.alreadyApplied);
        
        const [opportunityResponse, similarResponse] = await Promise.all([
          opportuniteApi.getById(this.id),
          opportuniteApi.getSimilarOpportunites(this.id)
        ]);
        
        if (opportunityResponse.data.opportunite) {
          this.opportunite = opportunityResponse.data.opportunite;
        } else if (opportunityResponse.data.message) {
          this.error = opportunityResponse.data.message;
        }
        
        if (similarResponse.data && similarResponse.data.length > 0) {
          this.similarOpportunites = similarResponse.data;
        }
      } catch (error) {
        console.error("Error loading data:", error);
        if (error.response && error.response.data && error.response.data.message) {
          this.error = error.response.data.message;
        } else {
          this.error = "Impossible de charger les données. Veuillez réessayer plus tard.";
        }
      } finally {
        this.isLoading = false;
      }
    }
  };
  </script>