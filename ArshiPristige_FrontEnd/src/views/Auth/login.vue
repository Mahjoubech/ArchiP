<template>
    <div v-if="isLoading" class="min-h-screen flex items-center justify-center">
        <LoadingSpinner />
    </div>
    <div v-else class="min-h-screen bg-gradient-to-br from-gray-50 to-gray-100">
        <div class="container mx-auto px-4 py-16">
            <div class="text-center mb-16 animate-fade-in-down">
                <h1 class="text-4xl md:text-5xl font-bold text-gray-900 mb-4">
                    Bienvenue sur <span class="text-[#00B3AD]">BénévoMaroc</span>
                </h1>
                <p class="text-xl text-gray-600 max-w-2xl mx-auto">
                    Connectez-vous pour continuer votre aventure dans le bénévolat
                </p>
            </div>
    
            <div class="max-w-xl mx-auto">
                <div class="relative overflow-hidden bg-white rounded-2xl shadow-xl">
                    <div class="absolute top-0 left-0 right-0 h-2 bg-[#00B3AD]"></div>
                    
                    <div class="p-8">
                        <div class="flex items-center mb-6">
                            <div class="w-16 h-16 bg-[#00B3AD]/10 rounded-2xl flex items-center justify-center mr-4 transform rotate-3">
                                <i class="fas fa-user-circle text-2xl text-[#00B3AD]"></i>
                            </div>
                            <div>
                                <h3 class="text-2xl font-bold text-gray-900">Connexion</h3>
                                <p class="text-gray-500">Accédez à votre compte</p>
                            </div>
                        </div>

                        <div v-if="errorMessage" class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
                            {{ errorMessage }}
                        </div>

                        <form @submit.prevent="onSubmit" class="mb-6">
                            <div class="space-y-5">
                                <div>
                                    <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                                    <div class="relative">
                                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                            <i class="fas fa-envelope text-[#00B3AD]"></i>
                                        </div>
                                        <input v-model="formData.email" type="email" id="email" name="email" 
                                            class="block w-full pl-10 pr-3 py-2 bg-gray-50 border border-gray-300 rounded-xl focus:ring-2 focus:ring-[#00B3AD] focus:border-[#00B3AD]" 
                                            placeholder="votre@email.com">
                                    </div>
                                </div>
                                
                                <div>
                                    <div class="flex justify-between mb-1">
                                        <label for="password" class="block text-sm font-medium text-gray-700">Mot de passe</label>
                                    </div>
                                    <div class="relative">
                                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                            <i class="fas fa-lock text-[#00B3AD]"></i>
                                        </div>
                                        <input v-model="formData.password" type="password" id="password" name="password" 
                                            class="block w-full pl-10 pr-3 py-2 bg-gray-50 border border-gray-300 rounded-xl focus:ring-2 focus:ring-[#00B3AD] focus:border-[#00B3AD]" 
                                            placeholder="••••••••">
                                    </div>
                                </div>
                            </div>
                            
                            <button type="submit" class="w-full mt-6 flex justify-center py-2 px-4 border border-transparent rounded-xl shadow-sm text-white bg-[#00B3AD] hover:bg-[#00B3AD]/90 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-[#00B3AD]">
                                Se connecter
                            </button>
                        </form>

                        <div class="mt-6 text-center">
                            <p class="text-gray-600">
                                Vous n'avez pas de compte? 
                                <router-link to="/register">
                                    <span class="font-medium text-[#00B3AD] hover:underline">S'inscrire</span>
                                </router-link>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import { authStore } from "@/stores/auth";
import authapi from "@/api/auth";   
import LoadingSpinner from "@/components/LoadingSpinner.vue";

export default {
    components: {
        LoadingSpinner,
    },
    data() {
        return {
            formData: {
                email: "",
                password: "",
                remember: false,
            },
            isLoading: false,
            errorMessage: "", 
        };
    },
    methods: {
    async onSubmit() {
        this.isLoading = true;
        this.errorMessage = ""; 
        try {
            const response = await authapi.login(this.formData);
            const token = response.data.token;

            sessionStorage.setItem("authToken", token);
            document.cookie = `authToken=${token}; Secure; SameSite=Strict; path=/`;

            authStore.login({
                role: response.data.user.role,
                ...response.data.user
            });

            const role = response.data.user.role;
            if (role === "admin") {
                this.$router.push("/dashboard");
            } else if (role === "association") {
                this.$router.push("/dashboard");
            } else {
                this.$router.push("/profile");
            }
        } catch (error) {
            if (error.response && error.response.status === 403) {
                this.errorMessage = "Votre compte n’a pas encore été validé. Veuillez patienter jusqu'à ce qu'un administrateur accepte votre compte.";
            } else {
                this.errorMessage = "Email ou mot de passe incorrect. Veuillez réessayer.";
            }
        } finally {
            this.isLoading = false;
        }
    },
},
};
</script>