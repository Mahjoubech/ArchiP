<script setup lang="ts">
import { RouterLink } from 'vue-router';

</script>

<template>
    <div class="relative bg-[#00B3AD] text-white py-16">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center">
            <h1 class="text-4xl font-bold mb-4">Cadre Juridique du Bénévolat au Maroc
            </h1>
            <p class="text-xl opacity-90 max-w-3xl mx-auto">
                Guide complet des aspects juridiques pour les associations et les bénévoles au Maroc
            </p>
        </div>
    </div>
    <div class="absolute bottom-0 left-0 right-0 h-16 bg-gray-50 transform skew-y-2 -mb-10"></div>
</div>

<div class="max-w-7xl mx-auto px-4 py-12">


    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8 mb-16">
        <div class="lg:col-span-2 space-y-8">
            <div class="bg-white rounded-xl p-6 shadow-sm">
                <h2 class="text-2xl font-bold text-gray-900 mb-6">
                    Cadre Légal des Associations au Maroc
                </h2>
                <div class="prose max-w-none text-gray-600">
                    <p class="mb-4">
                        Le droit associatif marocain est principalement régi par le Dahir n° 1-58-376 du 15 novembre 1958, 
                        modifié et complété par la loi 75-00 relative aux associations. Ce texte fondamental définit :
                    </p>
                    <ul class="list-disc pl-6 space-y-2 mb-6">
                        <li>La définition juridique d'une association</li>
                        <li>Les conditions de création et de fonctionnement</li>
                        <li>Les droits et obligations des associations</li>
                        <li>Les modalités de gestion et de gouvernance</li>
                    </ul>
                </div>
                <img src="/images/static/image10.png" 
                     alt="Cadre légal" 
                     class="w-full h-48 object-cover rounded-lg mb-4">
            </div>

            <div class="bg-white rounded-xl p-6 shadow-sm">
                <h2 class="text-2xl font-bold text-gray-900 mb-6">
                    Droits et Obligations des Bénévoles
                </h2>
                <div class="grid md:grid-cols-2 gap-6 mb-6">
                    <div>
                        <h3 class="font-semibold text-gray-900 mb-3">Droits des Bénévoles</h3>
                        <ul class="space-y-2 text-gray-600">
                            <li class="flex items-start">
                                <svg class="w-5 h-5 text-[#00B3AD] mt-1 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                </svg>
                                <span>Protection par l'assurance associative</span>
                            </li>
                            <li class="flex items-start">
                                <svg class="w-5 h-5 text-[#00B3AD] mt-1 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                </svg>
                                <span>Remboursement des frais engagés</span>
                            </li>
                            <li class="flex items-start">
                                <svg class="w-5 h-5 text-[#00B3AD] mt-1 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                </svg>
                                <span>Accès aux formations</span>
                            </li>
                        </ul>
                    </div>
                    <div>
                        <h3 class="font-semibold text-gray-900 mb-3">Obligations des Bénévoles</h3>
                        <ul class="space-y-2 text-gray-600">
                            <li class="flex items-start">
                                <svg class="w-5 h-5 text-[#00B3AD] mt-1 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                </svg>
                                <span>Respect des statuts de l'association</span>
                            </li>
                            <li class="flex items-start">
                                <svg class="w-5 h-5 text-[#00B3AD] mt-1 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                </svg>
                                <span>Discrétion et confidentialité</span>
                            </li>
                            <li class="flex items-start">
                                <svg class="w-5 h-5 text-[#00B3AD] mt-1 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                </svg>
                                <span>Respect des engagements pris</span>
                            </li>
                        </ul>
                    </div>
                </div>
               
            </div>

            <div class="bg-white rounded-xl p-6 shadow-sm">
                <h2 class="text-2xl font-bold text-gray-900 mb-6">
                    Aspects Fiscaux et Financiers
                </h2>
                <div class="prose max-w-none text-gray-600">
                    <p class="mb-4">
                        Les associations marocaines bénéficient d'un régime fiscal spécifique :
                    </p>
                    <ul class="list-disc pl-6 space-y-2 mb-6">
                        <li>Exonération de la TVA pour certaines activités</li>
                        <li>Possibilité de recevoir des dons et subventions</li>
                        <li>Obligation de tenir une comptabilité transparente</li>
                        <li>Déclarations fiscales spécifiques</li>
                    </ul>
                </div>
                <img src="/images/static/image12.jpg" 
                     alt="Aspects fiscaux" 
                     class="w-full h-48 object-cover rounded-lg">
            </div>
        </div>

        <div class="space-y-8">
            <div class="bg-white rounded-xl p-6 shadow-sm">
                <h3 class="text-xl font-bold text-gray-900 mb-4">Liens Utiles</h3>
                <ul class="space-y-3">
                    <li>
                        <RouterLink to="./Conditions_dutilisation" class="flex items-center text-gray-600 hover:text-[#00B3AD]">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                            </svg>
                            <span>conditions d'utilisation</span>
                        </RouterLink>
                    </li>
                    <li>
                        <RouterLink to="./Politique_confidentialite.vue" class="flex items-center text-gray-600 hover:text-[#00B3AD]">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                            </svg>
                            <span>la politique de confidentialité</span>
                        </RouterLink>
                    </li>
                </ul>
            </div>

            <div class="bg-white rounded-xl p-6 shadow-sm">
                <h3 class="text-xl font-bold text-gray-900 mb-4">Documents à Télécharger</h3>
                <ul class="space-y-3">
                    <li>
                        <a href="#" class="flex items-center p-3 border border-gray-200 rounded-lg hover:border-[#00B3AD] group">
                            <svg class="w-8 h-8 text-gray-400 group-hover:text-[#00B3AD]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3M3 17V7a2 2 0 012-2h6l2 2h6a2 2 0 012 2v8a2 2 0 01-2 2H5a2 2 0 01-2-2z"/>
                            </svg>
                            <div class="ml-3">
                                <span class="block text-sm font-medium text-gray-900">Modèle de statuts</span>
                                <span class="text-xs text-gray-500">PDF - 245 KB</span>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="flex items-center p-3 border border-gray-200 rounded-lg hover:border-[#00B3AD] group">
                            <svg class="w-8 h-8 text-gray-400 group-hover:text-[#00B3AD]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3M3 17V7a2 2 0 012-2h6l2 2h6a2 2 0 012 2v8a2 2 0 01-2 2H5a2 2 0 01-2-2z"/>
                            </svg>
                            <div class="ml-3">
                                <span class="block text-sm font-medium text-gray-900">Convention type</span>
                                <span class="text-xs text-gray-500">DOC - 128 KB</span>
                            </div>
                        </a>
                    </li>
                </ul>
            </div>

            <div class="bg-gradient-to-r from-[#00B3AD] to-[#009B96] rounded-xl p-6 text-white">
                <h3 class="text-xl font-bold mb-4">Besoin d'Aide ?</h3>
                <p class="text-white/90 mb-6">
                    Notre équipe juridique est là pour répondre à vos questions.
                </p>
                <a href="#" class="inline-flex items-center justify-center w-full px-4 py-2 bg-white text-[#00B3AD] rounded-lg hover:bg-gray-50 transition-colors">
                    Contacter le support
                </a>
            </div>
        </div>
    </div>
</div>
</template>