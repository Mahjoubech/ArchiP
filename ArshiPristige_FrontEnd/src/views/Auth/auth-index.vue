<template>
    <div class="min-h-screen bg-gradient-to-br from-gray-50 to-gray-100">
        <div class="container mx-auto px-4 py-16">
            <div class="text-center mb-16 animate-fade-in-down">
                <h1 class="text-4xl md:text-5xl font-bold text-gray-900 mb-4">
                    Rejoignez <span class="text-[#00B3AD]">BénévoMaroc</span>
                </h1>
                <p class="text-xl text-gray-600 max-w-2xl mx-auto">
                    Choisissez votre parcours et commencez votre aventure dans le bénévolat
                </p>
            </div>

            <div class="max-w-6xl mx-auto">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-8 mb-12">
                    <div class="transform transition-all duration-300 hover:scale-[1.02]">
                        <input type="radio" name="account-type" id="benevole" class="peer hidden">
                        <label for="benevole" class="block cursor-pointer">
                            <div class="relative overflow-hidden bg-white rounded-2xl shadow-xl peer-checked:shadow-[#00B3AD]/20 
                                        peer-checked:border-2 peer-checked:border-[#00B3AD]">
                                <div class="absolute top-0 left-0 right-0 h-2 bg-[#00B3AD] transform origin-left 
                                            scale-x-0 peer-checked:scale-x-100 transition-transform duration-300"></div>
                                
                                <div class="p-8">
                                 <router-link :to="'/register-benevole/'">
                                    
                                    <div class="flex items-center mb-6">
                                        <div class="w-16 h-16 bg-[#00B3AD]/10 rounded-2xl flex items-center justify-center mr-4 
                                                    transform rotate-3">
                                            <i class="fas fa-hands-helping text-2xl text-[#00B3AD]"></i>
                                        </div>
                                        <div>
                                            <h3 class="text-2xl font-bold text-gray-900">Devenir Bénévole</h3>
                                            <p class="text-gray-500">Compte Personnel</p>
                                        </div>
                                    </div>


                                    <p class="text-gray-600 mb-6 leading-relaxed">
                                        Rejoignez notre communauté dynamique de bénévoles et participez à des projets qui font la différence.
                                    </p>

                                    <ul class="space-y-4">
                                        <li class="flex items-center text-gray-600">
                                            <div class="w-8 h-8 bg-[#00B3AD]/10 rounded-lg flex items-center justify-center mr-3">
                                                <i class="fas fa-search text-[#00B3AD]"></i>
                                            </div>
                                            <span>Trouvez des missions qui vous correspondent</span>
                                        </li>
                                        <li class="flex items-center text-gray-600">
                                            <div class="w-8 h-8 bg-[#00B3AD]/10 rounded-lg flex items-center justify-center mr-3">
                                                <i class="fas fa-star text-[#00B3AD]"></i>
                                            </div>
                                            <span>Développez vos compétences</span>
                                        </li>
                                        <li class="flex items-center text-gray-600">
                                            <div class="w-8 h-8 bg-[#00B3AD]/10 rounded-lg flex items-center justify-center mr-3">
                                                <i class="fas fa-heart text-[#00B3AD]"></i>
                                            </div>
                                            <span>Créez un impact social positif</span>
                                        </li>
                                    </ul>

                                    <div class="mt-8 flex items-center justify-between">
                                        <span class="text-sm font-medium text-gray-500">Inscription gratuite</span>
                                    </div>
                                </router-link>
                                </div>
                            </div>
                        </label>
                    </div>

                    <div class="transform transition-all duration-300 hover:scale-[1.02]">
                        <input type="radio" name="account-type" id="association" class="peer hidden">
                        <label for="association" class="block cursor-pointer">
                            <div class="relative overflow-hidden bg-white rounded-2xl shadow-xl peer-checked:shadow-[#C9559B]/20 
                                        peer-checked:border-2 peer-checked:border-[#C9559B]">
                                <div class="absolute top-0 left-0 right-0 h-2 bg-[#C9559B] transform origin-left 
                                            scale-x-0 peer-checked:scale-x-100 transition-transform duration-300"></div>
                                
                                <div class="p-8">
                                    <router-link :to="'/register-association/'">
                                    <div class="flex items-center mb-6">
                                        <div class="w-16 h-16 bg-[#C9559B]/10 rounded-2xl flex items-center justify-center mr-4 
                                                    transform -rotate-3">
                                            <i class="fas fa-building text-2xl text-[#C9559B]"></i>
                                        </div>
                                        <div>
                                            <h3 class="text-2xl font-bold text-gray-900">Inscrire mon Association</h3>
                                            <p class="text-gray-500">Compte Organisation</p>
                                        </div>
                                    </div>

                                    <p class="text-gray-600 mb-6 leading-relaxed">
                                        Trouvez des bénévoles passionnés et engagés pour soutenir vos projets associatifs.
                                    </p>
                                    
                                    <ul class="space-y-4">
                                        <li class="flex items-center text-gray-600">
                                            <div class="w-8 h-8 bg-[#C9559B]/10 rounded-lg flex items-center justify-center mr-3">
                                                <i class="fas fa-users text-[#C9559B]"></i>
                                            </div>
                                            <span>Accédez à une communauté de bénévoles</span>
                                        </li>
                                        <li class="flex items-center text-gray-600">
                                            <div class="w-8 h-8 bg-[#C9559B]/10 rounded-lg flex items-center justify-center mr-3">
                                                <i class="fas fa-tasks text-[#C9559B]"></i>
                                            </div>
                                            <span>Gérez vos missions facilement</span>
                                        </li>
                                        <li class="flex items-center text-gray-600">
                                            <div class="w-8 h-8 bg-[#C9559B]/10 rounded-lg flex items-center justify-center mr-3">
                                                <i class="fas fa-chart-line text-[#C9559B]"></i>
                                            </div>
                                            <span>Suivez vos impacts et résultats</span>
                                        </li>
                                    </ul>

                                    <div class="mt-8 flex items-center justify-between">
                                        <span class="text-sm font-medium text-gray-500">Inscription gratuite</span>
                                      
                                    </div>
                                    </router-link>
                                </div>
                            </div>
                        </label>
                    </div>
                </div>

                <div class="text-center mt-8">
                    <p class="text-gray-600">
                        Vous avez déjà un compte ? 
                        <router-link to="/login" class="text-[#00B3AD] hover:underline font-medium">
                            Connectez-vous
                        </router-link>
                    </p>
                </div>
            </div>
        </div>
    </div>
</template>

<script>

</script>