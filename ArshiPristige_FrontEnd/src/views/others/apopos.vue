<script setup lang="ts">
import { RouterLink } from 'vue-router';

</script>

<template>
 <div class="bg-gray-50">
    <div class="relative bg-gray-800 text-white py-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center">
                <h1 class="text-4xl font-bold mb-4">À propos d'ArshiPristige Concept</h1>
                <p class="text-xl opacity-90 max-w-3xl mx-auto">
                    Excellence en architecture d'intérieur à Casablanca - Créons ensemble votre espace de rêve
                </p>
            </div>
        </div>
        <div class="absolute bottom-0 left-0 right-0 h-16 bg-gray-50 transform skew-y-2 -mb-10"></div>
    </div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
        <div class="mb-20">
            <div class="flex flex-col md:flex-row items-center gap-12">
                <div class="md:w-1/2">
                    <h2 class="text-3xl font-bold text-gray-900 mb-6">Notre Mission</h2>
                    <p class="text-gray-600 mb-4">
                        ArshiPristige Concept est née d'une passion pour l'architecture d'intérieur et d'une vision : créer des espaces uniques qui allient esthétique, fonctionnalité et confort.
                    </p>
                    <p class="text-gray-600 mb-4">
                        Notre équipe d'experts travaille en étroite collaboration avec vous pour transformer vos idées en réalité, en respectant votre budget et vos délais.
                    </p>
                    <p class="text-gray-600 mb-6">
                        Basée à Casablanca, notre agence intervient dans tout le Maroc pour créer des environnements qui reflètent votre personnalité et répondent parfaitement à vos besoins quotidiens.
                    </p>
                    <div class="flex items-center mt-6">
                        <div class="flex items-center space-x-2 text-gray-800">
                            <i class="fas fa-check-circle text-2xl"></i>
                            <span class="font-medium">Plus de 150 projets réalisés</span>
                        </div>
                    </div>
                    <div class="flex items-center mt-4">
                        <div class="flex items-center space-x-2 text-gray-800">
                            <i class="fas fa-check-circle text-2xl"></i>
                            <span class="font-medium">+8 années d'expérience en architecture d'intérieur</span>
                        </div>
                    </div>
                </div>
                <div class="md:w-1/2">
                    <img src="/images/static/image4.jpg" alt="Notre Mission" class="rounded-lg shadow-lg w-full">
                </div>
            </div>
        </div>
        

        <div class="mb-20">
            <h2 class="text-3xl font-bold text-gray-900 text-center mb-12">Nos Valeurs</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="bg-white p-6 rounded-lg shadow-sm border border-gray-100 text-center">
                    <div class="text-gray-800 mb-4">
                        <i class="fas fa-star text-4xl"></i>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-900 mb-3">Excellence</h3>
                    <p class="text-gray-600">
                        Nous visons l'excellence dans chaque projet, en portant une attention particulière aux détails et à la qualité.
                    </p>
                </div>

                <div class="bg-white p-6 rounded-lg shadow-sm border border-gray-100 text-center">
                    <div class="text-gray-800 mb-4">
                        <i class="fas fa-users text-4xl"></i>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-900 mb-3">Collaboration</h3>
                    <p class="text-gray-600">
                        Nous travaillons en étroite collaboration avec nos clients pour créer des espaces qui reflètent leur vision.
                    </p>
                </div>

                <div class="bg-white p-6 rounded-lg shadow-sm border border-gray-100 text-center">
                    <div class="text-gray-800 mb-4">
                        <i class="fas fa-clock text-4xl"></i>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-900 mb-3">Respect des Délais</h3>
                    <p class="text-gray-600">
                        Nous nous engageons à respecter les délais convenus et à livrer votre projet dans les temps.
                    </p>
                </div>
            </div>
        </div>

        <div class="mb-20">
            <h2 class="text-3xl font-bold text-gray-900 text-center mb-12">Notre Impact</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
                <div class="text-center">
                    <div class="text-4xl font-bold text-gray-800 mb-2">150+</div>
                    <p class="text-gray-600">Projets Réalisés</p>
                </div>
                <div class="text-center">
                    <div class="text-4xl font-bold text-gray-800 mb-2">120+</div>
                    <p class="text-gray-600">Clients Satisfaits</p>
                </div>
                <div class="text-center">
                    <div class="text-4xl font-bold text-gray-800 mb-2">8+</div>
                    <p class="text-gray-600">Années d'Expérience</p>
                </div>
                <div class="text-center">
                    <div class="text-4xl font-bold text-gray-800 mb-2">100%</div>
                    <p class="text-gray-600">Satisfaction Client</p>
                </div>
            </div>
        </div>

        <div class="mb-20">
            <h2 class="text-3xl font-bold text-gray-900 text-center mb-12">Notre Équipe</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-12">
                <div class="bg-white p-8 rounded-lg shadow-lg border border-gray-100">
                    <div class="text-center mb-6">
                        <div class="w-24 h-24 bg-gray-800 text-white rounded-full flex items-center justify-center text-3xl mx-auto mb-4">
                            <i class="fas fa-user-tie"></i>
                        </div>
                        <h3 class="text-2xl font-bold text-gray-800">Omar Natali</h3>
                        <p class="text-gray-600">Chef d'entreprise & Architecte d'Intérieur</p>
                    </div>
                    <p class="text-gray-600 text-center">
                        Avec plus de 8 années d'expérience en architecture d'intérieur, Omar Natali dirige ArshiPristige Concept avec passion et expertise. Sa vision créative et son attention aux détails font de chaque projet une œuvre d'art unique.
                    </p>
                </div>
                
                <div class="bg-white p-8 rounded-lg shadow-lg border border-gray-100">
                    <div class="text-center mb-6">
                        <div class="w-24 h-24 bg-gray-800 text-white rounded-full flex items-center justify-center text-3xl mx-auto mb-4">
                            <i class="fas fa-users"></i>
                        </div>
                        <h3 class="text-2xl font-bold text-gray-800">Notre Équipe</h3>
                        <p class="text-gray-600">Professionnels Certifiés</p>
                    </div>
                    <p class="text-gray-600 text-center">
                        Notre équipe de designers, architectes et artisans qualifiés travaille en harmonie pour transformer vos rêves en réalité. Chaque membre apporte son expertise unique pour créer des espaces exceptionnels.
                    </p>
                </div>
            </div>
        </div>

        <div class="text-center bg-gray-100 rounded-lg p-12">
            <h2 class="text-3xl font-bold text-gray-900 mb-6">Transformons Votre Espace</h2>
            <p class="text-gray-600 mb-8 max-w-2xl mx-auto">
                Prêt à donner vie à votre projet d'architecture d'intérieur ? Contactez-nous pour discuter de vos idées et obtenir un devis personnalisé.
            </p>
            <div class="flex justify-center space-x-4">
                <RouterLink to="/contact" class="inline-flex items-center px-6 py-3 border border-transparent text-base font-medium rounded-md text-white bg-gray-800 hover:bg-gray-700">
                    Demander un Devis
                </RouterLink>

                <a href="tel:0669012146" class="inline-flex items-center px-6 py-3 border border-gray-800 text-base font-medium rounded-md text-gray-800 bg-white hover:bg-gray-50">
                    <i class="fas fa-phone mr-2"></i>06 69 01 21 46
                </a>
            </div>
        </div>
    </div>
</div>   
</template>