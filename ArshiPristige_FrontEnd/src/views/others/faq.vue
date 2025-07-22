<template>
    <div class="bg-gray-50 py-12">
      <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Header Section -->
        <div class="text-center mb-12">
          <h1 class="text-4xl font-bold text-gray-900 mb-4">Foire Aux Questions</h1>
          <p class="text-lg text-gray-600">Trouvez les réponses à vos questions les plus fréquentes sur le bénévolat au Maroc</p>
        </div>
  
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 mb-12">
          <div class="bg-white p-6 rounded-lg shadow-sm border border-gray-100">
            <div class="text-[#00B3AD] mb-4">
              <i class="fas fa-user-friends text-3xl"></i>
            </div>
            <h3 class="text-xl font-semibold text-gray-900 mb-2">Pour les Bénévoles</h3>
            <p class="text-gray-600 mb-4">Questions fréquentes pour ceux qui souhaitent faire du bénévolat</p>
            <button class="text-[#C9559B] hover:text-[#00B3AD] font-medium">
              Voir les questions <i class="fas fa-arrow-right ml-2"></i>
            </button>
          </div>
  
          <div class="bg-white p-6 rounded-lg shadow-sm border border-gray-100">
            <div class="text-[#00B3AD] mb-4">
              <i class="fas fa-building text-3xl"></i>
            </div>
            <h3 class="text-xl font-semibold text-gray-900 mb-2">Pour les Associations</h3>
            <p class="text-gray-600 mb-4">Informations importantes pour les organisations</p>
            <button class="text-[#C9559B] hover:text-[#00B3AD] font-medium">
              Voir les questions <i class="fas fa-arrow-right ml-2"></i>
            </button>
          </div>
  
          <div class="bg-white p-6 rounded-lg shadow-sm border border-gray-100">
            <div class="text-[#00B3AD] mb-4">
              <i class="fas fa-question-circle text-3xl"></i>
            </div>
            <h3 class="text-xl font-semibold text-gray-900 mb-2">Questions Générales</h3>
            <p class="text-gray-600 mb-4">Informations générales sur notre plateforme</p>
            <button class="text-[#C9559B] hover:text-[#00B3AD] font-medium">
              Voir les questions <i class="fas fa-arrow-right ml-2"></i>
            </button>
          </div>
        </div>
  
        <div class="max-w-3xl mx-auto space-y-4">
          <div class="border border-gray-200 rounded-lg">
            <button @click="toggleFaq(0)" class="w-full text-left px-6 py-4 focus:outline-none flex justify-between items-center">
              <span class="text-lg font-medium text-gray-900">Comment puis-je devenir bénévole ?</span>
              <i :class="['fas', activeIndex === 0 ? 'fa-chevron-up' : 'fa-chevron-down', 'text-[#C9559B]']"></i>
            </button>
            <div v-show="activeIndex === 0" class="px-6 pb-4">
              <p class="text-gray-600">Pour devenir bénévole, il vous suffit de :</p>
              <ul class="list-disc list-inside mt-2 text-gray-600 space-y-2">
                <li>Créer un compte sur notre plateforme</li>
                <li>Compléter votre profil avec vos compétences et disponibilités</li>
                <li>Parcourir les opportunités de bénévolat</li>
                <li>Postuler aux missions qui vous intéressent</li>
              </ul>
            </div>
          </div>
  
          <div class="border border-gray-200 rounded-lg">
            <button @click="toggleFaq(1)" class="w-full text-left px-6 py-4 focus:outline-none flex justify-between items-center">
              <span class="text-lg font-medium text-gray-900">Quels types de missions sont proposés ?</span>
              <i :class="['fas', activeIndex === 1 ? 'fa-chevron-up' : 'fa-chevron-down', 'text-[#C9559B]']"></i>
            </button>
            <div v-show="activeIndex === 1" class="px-6 pb-4">
              <p class="text-gray-600">Nous proposons diverses missions dans les domaines suivants :</p>
              <ul class="list-disc list-inside mt-2 text-gray-600 space-y-2">
                <li>Éducation et soutien scolaire</li>
                <li>Protection de l'environnement</li>
                <li>Aide aux personnes âgées</li>
                <li>Soutien aux associations locales</li>
                <li>Actions culturelles et artistiques</li>
              </ul>
            </div>
          </div>
  
          <div class="border border-gray-200 rounded-lg">
            <button @click="toggleFaq(2)" class="w-full text-left px-6 py-4 focus:outline-none flex justify-between items-center">
              <span class="text-lg font-medium text-gray-900">Comment publier une mission de bénévolat ?</span>
              <i :class="['fas', activeIndex === 2 ? 'fa-chevron-up' : 'fa-chevron-down', 'text-[#C9559B]']"></i>
            </button>
            <div v-show="activeIndex === 2" class="px-6 pb-4">
              <p class="text-gray-600">Pour publier une mission, suivez ces étapes :</p>
              <ul class="list-disc list-inside mt-2 text-gray-600 space-y-2">
                <li>Connectez-vous à votre compte association</li>
                <li>Cliquez sur "Publier une mission"</li>
                <li>Remplissez le formulaire détaillé</li>
                <li>Précisez les compétences requises</li>
                <li>Validez et publiez votre annonce</li>
              </ul>
            </div>
          </div>
  
          <div class="border border-gray-200 rounded-lg">
            <button @click="toggleFaq(3)" class="w-full text-left px-6 py-4 focus:outline-none flex justify-between items-center">
              <span class="text-lg font-medium text-gray-900">La plateforme est-elle gratuite ?</span>
              <i :class="['fas', activeIndex === 3 ? 'fa-chevron-up' : 'fa-chevron-down', 'text-[#C9559B]']"></i>
            </button>
            <div v-show="activeIndex === 3" class="px-6 pb-4">
              <p class="text-gray-600">Oui, BénévoMaroc est une plateforme entièrement gratuite pour :</p>
              <ul class="list-disc list-inside mt-2 text-gray-600 space-y-2">
                <li>L'inscription des bénévoles</li>
                <li>La création de profil association</li>
                <li>La publication d'offres de missions</li>
                <li>La mise en relation entre bénévoles et associations</li>
              </ul>
            </div>
          </div>
        </div>
  
        <div class="text-center mt-12">
          <p class="text-gray-600 mb-4">Vous n'avez pas trouvé la réponse à votre question ?</p>
          <RouterLink to="/contact" class="inline-flex items-center justify-center px-6 py-3 border border-transparent text-base font-medium rounded-md text-white bg-[#00B3AD] hover:bg-[#009B96]">
            Contactez-nous
            <i class="fas fa-envelope ml-2"></i>
          </RouterLink>
        </div>
      </div>
    </div>
  </template>
  
  <script>
import { RouterLink } from 'vue-router';

  export default {
    data() {
      return {
        activeIndex: null
      }
    },
    methods: {
      toggleFaq(index) {
        if (this.activeIndex === index) {
          this.activeIndex = null
        } else {
          this.activeIndex = index
        }
      }
    }
  }
  </script>