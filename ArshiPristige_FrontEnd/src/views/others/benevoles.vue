<script setup lang="ts">
import { RouterLink } from 'vue-router';

</script>

<template>
    <div class="min-h-screen bg-gray-50">
    <div class="relative bg-[#C9559B] text-white py-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center">
                <h1 class="text-4xl font-bold mb-4">Ensemble, Créons un Impact Positif
                </h1>
                <p class="text-xl opacity-90 max-w-3xl mx-auto">
                    Le bénévolat n'est pas seulement un don de temps, c'est un investissement dans notre communauté et en vous-même.
                </p>
            </div>
        </div>
        <div class="absolute bottom-0 left-0 right-0 h-16 bg-gray-50 transform skew-y-2 -mb-10"></div>
    </div>

    <div class="max-w-7xl mx-auto px-4 py-12">
        <div class="space-y-24">
            <div class="flex flex-col md:flex-row items-center gap-12">
                <div class="md:w-1/2">
                    <img src="/images/static/image4.jpg" 
                         alt="Volunteers working together" 
                         class="rounded-2xl shadow-lg">
                </div>
                <div class="md:w-1/2 space-y-6">
                    <h2 class="text-3xl font-bold text-gray-900">Pourquoi devenir bénévole ?</h2>
                    <p class="text-lg text-gray-600">
                        Le bénévolat vous permet de développer de nouvelles compétences, de rencontrer des personnes inspirantes et de contribuer à des causes qui vous tiennent à cœur. C'est une opportunité unique de faire la différence tout en vous enrichissant personnellement.
                    </p>
                    <ul class="space-y-4">
                        <li class="flex items-start">
                            <svg class="w-6 h-6 text-[#00B3AD] mt-1 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                            <span class="text-gray-600">Développez de nouvelles compétences valorisables</span>
                        </li>
                        <li class="flex items-start">
                            <svg class="w-6 h-6 text-[#00B3AD] mt-1 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                            <span class="text-gray-600">Élargissez votre réseau social et professionnel</span>
                        </li>
                        <li class="flex items-start">
                            <svg class="w-6 h-6 text-[#00B3AD] mt-1 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                            <span class="text-gray-600">Donnez du sens à votre temps libre</span>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="flex flex-col-reverse md:flex-row items-center gap-12">
                <div class="md:w-1/2 space-y-6">
                    <h2 class="text-3xl font-bold text-gray-900">Comment ça marche ?</h2>
                    <p class="text-lg text-gray-600">
                        Notre plateforme simplifie votre engagement bénévole. En quelques clics, trouvez des missions qui correspondent à vos disponibilités et à vos centres d'intérêt.
                    </p>
                    <div class="space-y-6">
                        <div class="flex items-start space-x-4">
                            <div class="w-8 h-8 bg-[#00B3AD]/10 rounded-full flex items-center justify-center flex-shrink-0">
                                <span class="text-[#00B3AD] font-semibold">1</span>
                            </div>
                            <div>
                                <h3 class="font-semibold text-gray-900">Inscrivez-vous gratuitement</h3>
                                <p class="text-gray-600">Créez votre profil en quelques minutes</p>
                            </div>
                        </div>
                        <div class="flex items-start space-x-4">
                            <div class="w-8 h-8 bg-[#00B3AD]/10 rounded-full flex items-center justify-center flex-shrink-0">
                                <span class="text-[#00B3AD] font-semibold">2</span>
                            </div>
                            <div>
                                <h3 class="font-semibold text-gray-900">Découvrez les missions</h3>
                                <p class="text-gray-600">Trouvez les opportunités qui vous correspondent</p>
                            </div>
                        </div>
                        <div class="flex items-start space-x-4">
                            <div class="w-8 h-8 bg-[#00B3AD]/10 rounded-full flex items-center justify-center flex-shrink-0">
                                <span class="text-[#00B3AD] font-semibold">3</span>
                            </div>
                            <div>
                                <h3 class="font-semibold text-gray-900">Engagez-vous</h3>
                                <p class="text-gray-600">Commencez votre aventure bénévole</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="md:w-1/2">
                    <img src="/images/static/image5.jpeg" 
                         alt="People collaborating" 
                         class="rounded-2xl shadow-lg">
                </div>
            </div>

            <!-- Section 3: Témoignages -->
            <div class="text-center space-y-12">
                <h2 class="text-3xl font-bold text-gray-900">Ils ont franchi le pas</h2>
                <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                    <!-- Testimonial 1 -->
                    <div class="bg-white p-6 rounded-xl shadow-sm">
                        <div class="w-16 h-16 mx-auto mb-4 rounded-full overflow-hidden">
                            <img src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?ixlib=rb-1.2.1&auto=format&fit=crop&w=200&q=80" 
                                 alt="Sarah" 
                                 class="w-full h-full object-cover">
                        </div>
                        <p class="text-gray-600 mb-4">
                            "Le bénévolat m'a permis de donner du sens à mon temps libre tout en développant de nouvelles compétences."
                        </p>
                        <p class="font-semibold text-gray-900">Sarah Wakhron, 28 ans</p>
                        <p class="text-sm text-gray-500">Étudiante en master</p>
                    </div>

                    <!-- Testimonial 2 -->
                    <div class="bg-white p-6 rounded-xl shadow-sm">
                        <div class="w-16 h-16 mx-auto mb-4 rounded-full overflow-hidden">
                            <img src="/images/static/image5.jpg" 
                                 alt="Thomas" 
                                 class="w-full h-full object-cover">
                        </div>
                        <p class="text-gray-600 mb-4">
                            "J'ai trouvé une communauté incroyable et des amis pour la vie grâce au bénévolat."
                        </p>
                        <p class="font-semibold text-gray-900">Rida BenTaleb, 45 ans</p>
                        <p class="text-sm text-gray-500">Ingénieur</p>
                    </div>

                    <!-- Testimonial 3 -->
                    <div class="bg-white p-6 rounded-xl shadow-sm">
                        <div class="w-16 h-16 mx-auto mb-4 rounded-full overflow-hidden">
                            <img src="/images/static/image6.jpg" 
                                 alt="Marie" 
                                 class="w-full h-full object-cover">
                        </div>
                        <p class="text-gray-600 mb-4">
                            "Une expérience enrichissante qui m'a permis de rester active et utile pendant ma retraite."
                        </p>
                        <p class="font-semibold text-gray-900">Hassan Elchabi, 65 ans</p>
                        <p class="text-sm text-gray-500">Retraitée</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="mt-24 bg-gradient-to-r from-[#00B3AD] to-[#009B96] rounded-2xl p-12 text-center">
            <h2 class="text-3xl font-bold text-white mb-6">
                Prêt à commencer votre aventure ?
            </h2>
            <p class="text-white/90 text-lg mb-8 max-w-2xl mx-auto">
                Rejoignez notre communauté de bénévoles et commencez à faire la différence dès aujourd'hui.
            </p>
            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <RouterLink to="register-benevole" class="inline-flex items-center justify-center px-8 py-3 rounded-lg text-[#00B3AD] bg-white hover:bg-gray-50 transition-colors duration-200 font-medium">
                    Je deviens bénévole
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