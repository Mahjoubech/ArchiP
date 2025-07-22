<template>
    <div class="bg-gray-50 min-h-screen">
    <div class="relative bg-[#00B3AD] text-white py-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center">
                <h1 class="text-4xl font-bold mb-4">Contactez-nous</h1>
                <p class="text-xl opacity-90 max-w-3xl mx-auto">
                    Une question ? Un projet ? N'hésitez pas à nous contacter !
                </p>
            </div>
        </div>
        <div class="absolute bottom-0 left-0 right-0 h-16 bg-gray-50 transform skew-y-2 -mb-10"></div>
    </div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            <div class="lg:col-span-1">
                <div class="bg-white rounded-lg shadow-sm p-6 border border-gray-100">
                    <h2 class="text-2xl font-bold text-gray-900 mb-6">Informations de Contact</h2>
                    
                    <div class="flex items-start space-x-4 mb-6">
                        <div class="text-[#C9559B]">
                            <i class="fas fa-map-marker-alt text-xl"></i>
                        </div>
                        <div>
                            <h3 class="font-semibold text-gray-900 mb-1">Notre Adresse</h3>
                            <p class="text-gray-600">
                                123 Avenue Hassan II<br>
                                20000 Casablanca<br>
                                Maroc
                            </p>
                        </div>
                    </div>

                    <div class="flex items-start space-x-4 mb-6">
                        <div class="text-[#C9559B]">
                            <i class="fas fa-envelope text-xl"></i>
                        </div>
                        <div>
                            <h3 class="font-semibold text-gray-900 mb-1">Email</h3>
                            <p class="text-gray-600">contact@benevolat.org</p>
                            <p class="text-gray-600">support@benevolat.org</p>
                        </div>
                    </div>

                    <div class="flex items-start space-x-4 mb-6">
                        <div class="text-[#C9559B]">
                            <i class="fas fa-phone text-xl"></i>
                        </div>
                        <div>
                            <h3 class="font-semibold text-gray-900 mb-1">Téléphone</h3>
                            <p class="text-gray-600">+212 5XX-XXXXXX</p>
                            <p class="text-gray-600">+212 6XX-XXXXXX</p>
                        </div>
                    </div>


                    <div class="mt-8 pt-6 border-t border-gray-100">
                        <h3 class="font-semibold text-gray-900 mb-4">Suivez-nous</h3>
                        <div class="flex space-x-4">
                            <a href="#" class="text-gray-400 hover:text-[#C9559B] transition-colors">
                                <i class="fab fa-facebook-f text-xl"></i>
                            </a>
                            <a href="#" class="text-gray-400 hover:text-[#C9559B] transition-colors">
                                <i class="fab fa-twitter text-xl"></i>
                            </a>
                            <a href="#" class="text-gray-400 hover:text-[#C9559B] transition-colors">
                                <i class="fab fa-instagram text-xl"></i>
                            </a>
                            <a href="#" class="text-gray-400 hover:text-[#C9559B] transition-colors">
                                <i class="fab fa-linkedin-in text-xl"></i>
                            </a>
                        </div>
                    </div>
                    <br>
                </div>
            </div>

            <div class="lg:col-span-2">
                <div class="bg-white rounded-lg shadow-sm p-6 border border-gray-100">
                    <h2 class="text-2xl font-bold text-gray-900 mb-6">Envoyez-nous un Message</h2>
                    
                    <!-- Success Message -->
                    <div v-if="messageSent" class="mb-6 bg-green-50 border border-green-200 text-green-700 p-4 rounded-md">
                        <div class="flex items-center">
                            <i class="fas fa-check-circle mr-2"></i>
                            <span>Votre message a été envoyé avec succès. Nous vous répondrons dans les plus brefs délais.</span>
                        </div>
                    </div>

                    <!-- Error Message -->
                    <div v-if="error" class="mb-6 bg-red-50 border border-red-200 text-red-700 p-4 rounded-md">
                        <div class="flex items-center">
                            <i class="fas fa-exclamation-circle mr-2"></i>
                            <span>{{ error }}</span>
                        </div>
                    </div>
                    
                    <form @submit.prevent="sendMessage" class="space-y-6">        
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label for="nom_complet" class="block text-sm font-medium text-gray-700 mb-1">Nom Complet</label>
                                <input type="text" 
                                       v-model="formData.nom_complet" 
                                       id="nom_complet" 
                                       class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-[#C9559B] focus:border-[#C9559B]" 
                                       required>
                            </div>
                            <div>
                                <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                                <input type="email" 
                                       v-model="formData.email" 
                                       id="email" 
                                       class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-[#C9559B] focus:border-[#C9559B]" 
                                       required>
                            </div>
                        </div>

                        <div>
                            <label for="sujet" class="block text-sm font-medium text-gray-700 mb-1">Sujet</label>
                            <input type="text" 
                                   v-model="formData.sujet" 
                                   id="sujet" 
                                   class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-[#C9559B] focus:border-[#C9559B]" 
                                   required>
                        </div>

                        <div>
                            <label for="message" class="block text-sm font-medium text-gray-700 mb-1">Message</label>
                            <textarea v-model="formData.message" 
                                      id="message" 
                                      rows="6" 
                                      class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-[#C9559B] focus:border-[#C9559B]" 
                                      required></textarea>
                        </div>

                        <div>
                            <button type="submit" 
                                    :disabled="isLoading"
                                    class="w-full bg-[#00B3AD] text-white px-6 py-3 rounded-md hover:bg-[#009B96] transition-colors focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-[#00B3AD] disabled:opacity-70 disabled:cursor-not-allowed flex items-center justify-center">
                                <i v-if="isLoading" class="fas fa-spinner fa-spin mr-2"></i>
                                {{ isLoading ? 'Envoi en cours...' : 'Envoyer le Message' }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="mt-12">
            <div class="bg-white rounded-lg shadow-sm p-6 border border-gray-100">
                <h2 class="text-2xl font-bold text-gray-900 mb-6">Notre Localisation</h2>
                <div class="aspect-w-16 aspect-h-9">
                    <iframe 
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3323.846981223989!2d-7.632349684395466!3d33.592031880733895!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zMzPCsDM1JzMxLjMiTiA3wrAzNyc1Ni41Ilc!5e0!3m2!1sfr!2sma!4v1635789012345!5m2!1sfr!2sma" 
                        class="w-full h-[400px] rounded-lg"
                        style="border:0;" 
                        allowfullscreen="" 
                        loading="lazy">
                    </iframe>
                </div>
            </div>
        </div>
    </div>
</div>
</template>

<script>
import axios from 'axios';

export default {
    data() {
        return {
            formData: {
                nom_complet: '',
                email: '',
                sujet: '',
                message: ''
            },
            isLoading: false,
            messageSent: false,
            error: ''
        }
    },
    methods: {
        async sendMessage() {
            this.isLoading = true;
            this.error = '';
            this.messageSent = false;
            
            try {
                const response = await axios.post('http://127.0.0.1:8000/api/contact', this.formData);
                this.messageSent = true;
                
                this.formData = {
                    nom_complet: '',
                    email: '',
                    sujet: '',
                    message: ''
                };
                
            } catch (error) {
                    this.error = "Une erreur est survenue lors de l'envoi du message. Veuillez réessayer.";
            } finally {
                this.isLoading = false;
            }
        }
    }
}
</script>