<script setup lang="ts">
import { RouterLink } from 'vue-router';

</script>

<template>
    <div class="min-h-screen bg-gray-50">
    <div class="relative bg-[#00B3AD] text-white py-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center">
                <h1 class="text-4xl font-bold mb-4">Les Associations : Piliers de Notre Société

                </h1>
                <p class="text-xl opacity-90 max-w-3xl mx-auto">
                    Découvrez pourquoi les associations jouent un rôle essentiel dans la construction d'une société plus solidaire et équitable.
                </p>
            </div>
        </div>
        <div class="absolute bottom-0 left-0 right-0 h-16 bg-gray-50 transform skew-y-2 -mb-10"></div>
    </div>

    <div class="max-w-7xl mx-auto px-4 py-12">


        <div class="space-y-24">
            <div class="flex flex-col md:flex-row items-center gap-12">
                <div class="md:w-1/2">
                    <img src="/images/static/image8.jpeg" 
                         alt="Community work" 
                         class="rounded-2xl shadow-lg">
                </div>
                <div class="md:w-1/2 space-y-6">
                    <h2 class="text-3xl font-bold text-gray-900">Un Impact Social Majeur</h2>
                    <p class="text-lg text-gray-600">
                        Les associations sont au cœur de l'action sociale, apportant des solutions concrètes aux défis de notre société :
                    </p>
                    <ul class="space-y-4">
                        <li class="flex items-start">
                            <svg class="w-6 h-6 text-[#00B3AD] mt-1 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                            <span class="text-gray-600">Lutte contre l'exclusion et la précarité</span>
                        </li>
                        <li class="flex items-start">
                            <svg class="w-6 h-6 text-[#00B3AD] mt-1 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                            <span class="text-gray-600">Protection de l'environnement</span>
                        </li>
                        <li class="flex items-start">
                            <svg class="w-6 h-6 text-[#00B3AD] mt-1 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                            <span class="text-gray-600">Soutien aux personnes vulnérables</span>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="flex flex-col-reverse md:flex-row items-center gap-12">
                <div class="md:w-1/2 space-y-6">
                    <h2 class="text-3xl font-bold text-gray-900">Un Acteur Économique Essentiel</h2>
                    <p class="text-lg text-gray-600">
                        Les associations contribuent significativement à l'économie locale et nationale :
                    </p>
                    <div class="grid grid-cols-2 gap-6">
                        <div class="bg-white p-4 rounded-lg shadow-sm">
                            <div class="text-3xl font-bold text-[#00B3AD] mb-2">200K+</div>
                            <div class="text-sm text-gray-600">Associations actives</div>
                        </div>
                        <div class="bg-white p-4 rounded-lg shadow-sm">
                            <div class="text-3xl font-bold text-[#00B3AD] mb-2">1%</div>
                            <div class="text-sm text-gray-600">Contribution au PIB*</div>
                        </div>
                        <div class="bg-white p-4 rounded-lg shadow-sm">
                            <div class="text-3xl font-bold text-[#00B3AD] mb-2">~30K</div>
                            <div class="text-sm text-gray-600">Emplois directs</div>
                        </div>
                        <div class="bg-white p-4 rounded-lg shadow-sm">
                            <div class="text-3xl font-bold text-[#00B3AD] mb-2">+500K</div>
                            <div class="text-sm text-gray-600">Bénévoles actifs</div>
                        </div>
                    </div>
                </div>
                <div class="md:w-1/2">
                    <img src="/images/static/image7.jpg" 
                         alt="Team collaboration" 
                         class="rounded-2xl shadow-lg">
                </div>
            </div>

            <div class="flex flex-col md:flex-row items-center gap-12">
                <div class="md:w-1/2">
                    <img src="/images/static/image9.png" 
                         alt="Innovation meeting" 
                         class="rounded-2xl shadow-lg">
                </div>
                <div class="md:w-1/2 space-y-6">
                    <h2 class="text-3xl font-bold text-gray-900">L'Innovation Sociale</h2>
                    <p class="text-lg text-gray-600">
                        Les associations sont des laboratoires d'innovation sociale, développant des solutions créatives aux défis contemporains :
                    </p>
                    <div class="space-y-4">
                        <div class="bg-white p-6 rounded-lg shadow-sm">
                            <h3 class="font-semibold text-gray-900 mb-2">Nouvelles Solutions</h3>
                            <p class="text-gray-600">Développement de réponses innovantes aux besoins sociaux</p>
                        </div>
                        <div class="bg-white p-6 rounded-lg shadow-sm">
                            <h3 class="font-semibold text-gray-900 mb-2">Expérimentation</h3>
                            <p class="text-gray-600">Test et mise en œuvre de nouveaux modèles d'action sociale</p>
                        </div>
                        <div class="bg-white p-6 rounded-lg shadow-sm">
                            <h3 class="font-semibold text-gray-900 mb-2">Impact Durable</h3>
                            <p class="text-gray-600">Création de changements positifs et durables dans la société</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="mt-24 bg-gradient-to-r from-[#00B3AD] to-[#009B96] rounded-2xl p-12 text-center">
            <h2 class="text-3xl font-bold text-white mb-6">
                Renforcez Votre Impact
            </h2>
            <p class="text-white/90 text-lg mb-8 max-w-2xl mx-auto">
                Rejoignez notre plateforme pour amplifier votre action et connecter avec des bénévoles engagés.
            </p>
            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <RouterLink to="/register-association" class="inline-flex items-center justify-center px-8 py-3 rounded-lg text-[#00B3AD] bg-white hover:bg-gray-50 transition-colors duration-200 font-medium">
                    Créer votre compte association
                    <svg class="ml-2 -mr-1 w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"/>
                    </svg>
                </RouterLink>
                <a href="#" class="inline-flex items-center justify-center px-8 py-3 rounded-lg text-white border border-white/30 hover:bg-white/10 transition-colors duration-200 font-medium">
                    En savoir plus
                </a>
            </div>
        </div>
    </div>
</div>
</template>