<script setup lang="ts">
import { RouterLink } from 'vue-router';

</script>

<template>
 <div class="bg-gray-50">
    <div class="relative bg-[#00B3AD] text-white py-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center">
                <h1 class="text-4xl font-bold mb-4">À propos de BénévoMaroc</h1>
                <p class="text-xl opacity-90 max-w-3xl mx-auto">
                    Ensemble, construisons un Maroc plus solidaire à travers le bénévolat et l'engagement citoyen
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
                        BénévoMaroc est née d'une vision simple mais puissante : créer des ponts entre les associations marocaines et les personnes désireuses de s'engager dans des actions bénévoles.
                    </p>
                    <p class="text-gray-600 mb-4">
                        Notre plateforme facilite la mise en relation entre les associations et les bénévoles, permettant ainsi de maximiser l'impact social positif dans nos communautés.
                    </p>
                    <p class="text-gray-600 mb-6">
                        En collaborant avec des partenaires locaux et internationaux, nous garantissons des missions adaptées à chacun, en fonction des compétences, des intérêts et de la localisation des bénévoles. Notre objectif est de promouvoir l'entraide et de bâtir une société plus solidaire.
                    </p>
                    <div class="flex items-center mt-6">
                        <div class="flex items-center space-x-2 text-[#C9559B]">
                            <i class="fas fa-check-circle text-2xl"></i>
                            <span class="font-medium">Plus de 1000 missions réalisées</span>
                        </div>
                    </div>
                    <div class="flex items-center mt-4">
                        <div class="flex items-center space-x-2 text-[#C9559B]">
                            <i class="fas fa-check-circle text-2xl"></i>
                            <span class="font-medium">Des milliers de bénévoles engagés à travers le Maroc</span>
                        </div>
                    </div>
                </div>
                <div class="md:w-1/2">
                    <img src="/images/static/image4.png" alt="Notre Mission" class="rounded-lg shadow-lg w-full">
                </div>
            </div>
        </div>
        

        <div class="mb-20">
            <h2 class="text-3xl font-bold text-gray-900 text-center mb-12">Nos Valeurs</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="bg-white p-6 rounded-lg shadow-sm border border-gray-100 text-center">
                    <div class="text-[#00B3AD] mb-4">
                        <i class="fas fa-hands-helping text-4xl"></i>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-900 mb-3">Solidarité</h3>
                    <p class="text-gray-600">
                        Promouvoir l'entraide et le soutien mutuel au sein de notre communauté.
                    </p>
                </div>

                <div class="bg-white p-6 rounded-lg shadow-sm border border-gray-100 text-center">
                    <div class="text-[#00B3AD] mb-4">
                        <i class="fas fa-heart text-4xl"></i>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-900 mb-3">Engagement</h3>
                    <p class="text-gray-600">
                        Encourager l'action citoyenne et la participation active dans la société.
                    </p>
                </div>

                <div class="bg-white p-6 rounded-lg shadow-sm border border-gray-100 text-center">
                    <div class="text-[#00B3AD] mb-4">
                        <i class="fas fa-check-double text-4xl"></i>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-900 mb-3">Transparence</h3>
                    <p class="text-gray-600">
                        Assurer une communication claire et honnête dans toutes nos actions.
                    </p>
                </div>
            </div>
        </div>

        <div class="mb-20">
            <h2 class="text-3xl font-bold text-gray-900 text-center mb-12">Notre Impact</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
                <div class="text-center">
                    <div class="text-4xl font-bold text-[#C9559B] mb-2">5000+</div>
                    <p class="text-gray-600">Bénévoles Inscrits</p>
                </div>
                <div class="text-center">
                    <div class="text-4xl font-bold text-[#C9559B] mb-2">300+</div>
                    <p class="text-gray-600">Associations Partenaires</p>
                </div>
                <div class="text-center">
                    <div class="text-4xl font-bold text-[#C9559B] mb-2">1000+</div>
                    <p class="text-gray-600">Missions Réalisées</p>
                </div>
                <div class="text-center">
                    <div class="text-4xl font-bold text-[#C9559B] mb-2">20K+</div>
                    <p class="text-gray-600">Heures de Bénévolat</p>
                </div>
            </div>
        </div>


        <div class="text-center bg-gray-100 rounded-lg p-12">
            <h2 class="text-3xl font-bold text-gray-900 mb-6">Rejoignez l'Aventure</h2>
            <p class="text-gray-600 mb-8 max-w-2xl mx-auto">
                Ensemble, nous pouvons faire la différence. Rejoignez notre communauté de bénévoles et associations engagés pour un Maroc plus solidaire.
            </p>
            <div class="flex justify-center space-x-4">
                <RouterLink to="register-benevole" class="inline-flex items-center px-6 py-3 border border-transparent text-base font-medium rounded-md text-white bg-[#00B3AD] hover:bg-[#009B96]">
                    Devenir Bénévole
                </RouterLink>

                <RouterLink to="register-association" class="inline-flex items-center px-6 py-3 border border-transparent text-base font-medium rounded-md text-[#C9559B] bg-white border-[#C9559B] hover:bg-pink-50">
                    Inscrire mon Association
                </RouterLink>
            </div>
        </div>
    </div>
</div>   
</template>