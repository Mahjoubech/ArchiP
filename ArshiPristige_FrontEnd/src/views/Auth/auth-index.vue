<template>
    <div class="min-h-screen bg-gradient-to-br from-gray-50 to-gray-100">
        <div class="container mx-auto px-4 py-16">
            <div class="text-center mb-16 animate-fade-in-down">
                <h1 class="text-4xl md:text-5xl font-bold text-gray-900 mb-4">
                    Rejoignez <span class="text-gray-800">ArshiPristige Concept</span>
                </h1>
                <p class="text-xl text-gray-600 max-w-2xl mx-auto">
                    Choisissez votre type de compte et commencez votre projet d'architecture d'intérieur
                </p>
            </div>

            <div class="max-w-6xl mx-auto">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-8 mb-12">
                    <div class="transform transition-all duration-300 hover:scale-[1.02]">
                        <input type="radio" name="account-type" id="benevole" class="peer hidden">
                        <label for="benevole" class="block cursor-pointer">
                            <div class="relative overflow-hidden bg-white rounded-2xl shadow-xl peer-checked:shadow-gray-800/20 
                                        peer-checked:border-2 peer-checked:border-gray-800">
                                <div class="absolute top-0 left-0 right-0 h-2 bg-gray-800 transform origin-left 
                                            scale-x-0 peer-checked:scale-x-100 transition-transform duration-300"></div>
                                
                                <div class="p-8">
                                    <router-link :to="'/register-benevole/'">
                                    <div class="flex items-center mb-6">
                                        <div class="w-16 h-16 bg-gray-800/10 rounded-2xl flex items-center justify-center mr-4 transform rotate-3">
                                            <i class="fas fa-user text-2xl text-gray-800"></i>
                                        </div>
                                        <div>
                                            <h3 class="text-2xl font-bold text-gray-900">Client</h3>
                                            <p class="text-gray-500">Compte Personnel</p>
                                        </div>
                                    </div>
                                    <p class="text-gray-600 mb-6 leading-relaxed">
                                        Transformez votre espace de vie avec nos services d'architecture d'intérieur personnalisés.
                                    </p>
                                    </router-link>
                                </div>
                            </div>
                        </label>
                    </div>

                    <div class="transform transition-all duration-300 hover:scale-[1.02]">
                        <input type="radio" name="account-type" id="association" class="peer hidden">
                        <label for="association" class="block cursor-pointer">
                            <div class="relative overflow-hidden bg-white rounded-2xl shadow-xl peer-checked:shadow-gray-800/20 
                                        peer-checked:border-2 peer-checked:border-gray-800">
                                <div class="absolute top-0 left-0 right-0 h-2 bg-gray-800 transform origin-left 
                                            scale-x-0 peer-checked:scale-x-100 transition-transform duration-300"></div>
                                
                                <div class="p-8">
                                    <router-link :to="'/register-association/'">
                                    <div class="flex items-center mb-6">
                                        <div class="w-16 h-16 bg-gray-800/10 rounded-2xl flex items-center justify-center mr-4 transform -rotate-3">
                                            <i class="fas fa-drafting-compass text-2xl text-gray-800"></i>
                                        </div>
                                        <div>
                                            <h3 class="text-2xl font-bold text-gray-900">Architecte</h3>
                                            <p class="text-gray-500">Compte Professionnel</p>
                                        </div>
                                    </div>
                                    <p class="text-gray-600 mb-6 leading-relaxed">
                                        Rejoignez notre plateforme en tant qu'architecte d'intérieur professionnel.
                                    </p>
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
