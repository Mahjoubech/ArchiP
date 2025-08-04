<template>
  <div class="min-h-screen bg-gradient-to-br from-gray-50 via-white to-gray-100">
    <!-- Hero Section with Enhanced Design -->
    <div class="relative bg-gradient-to-r from-gray-800 via-gray-900 to-gray-800 text-white py-20 overflow-hidden">
      <!-- Background Pattern -->
      <div class="absolute inset-0 opacity-10">
        <div class="absolute top-10 left-10 w-32 h-32 bg-white rounded-full blur-3xl"></div>
        <div class="absolute bottom-10 right-10 w-40 h-40 bg-white rounded-full blur-3xl"></div>
        <div class="absolute top-1/2 left-1/3 w-24 h-24 bg-white rounded-full blur-2xl"></div>
      </div>
      
      <div class="container mx-auto px-4 relative z-10">
        <div class="text-center">
          <div class="inline-flex items-center justify-center w-20 h-20 bg-white/10 rounded-2xl mb-6 backdrop-blur-sm">
            <i class="fas fa-drafting-compass text-3xl text-white"></i>
          </div>
          <h1 class="text-5xl font-bold mb-6 bg-gradient-to-r from-white to-gray-200 bg-clip-text text-transparent">
            Inscription Architecte
          </h1>
          <p class="text-xl opacity-90 max-w-2xl mx-auto leading-relaxed">
            Créez votre compte professionnel et commencez vos projets d'architecture d'intérieur
          </p>
        </div>
      </div>
      
      <!-- Decorative bottom wave -->
      <div class="absolute bottom-0 left-0 right-0">
        <svg viewBox="0 0 1200 120" fill="none" xmlns="http://www.w3.org/2000/svg">
          <path d="M0 120L50 105C100 90 200 60 300 45C400 30 500 30 600 37.5C700 45 800 60 900 67.5C1000 75 1100 75 1150 75L1200 75V120H1150C1100 120 1000 120 900 120C800 120 700 120 600 120C500 120 400 120 300 120C200 120 100 120 50 120H0Z" fill="rgb(249 250 251)"/>
        </svg>
      </div>
    </div>

    <!-- Registration Form with Enhanced Design -->
    <div class="container mx-auto px-4 py-16 -mt-8 relative z-20">
      <div class="max-w-5xl mx-auto">
        <!-- Enhanced Progress Steps -->
        <div class="mb-12">
          <div class="flex items-center justify-center space-x-12">
            <div class="flex items-center group">
              <div class="relative">
                <div class="w-12 h-12 rounded-full flex items-center justify-center text-sm font-bold transition-all duration-300 shadow-lg"
                  :class="[activeSection === 'personal' ? 'bg-gradient-to-r from-gray-800 to-gray-700 text-white scale-110' : 'bg-white text-gray-400 border-2 border-gray-200']">
                  <i class="fas fa-user"></i>
                </div>
                <div v-if="activeSection === 'personal'" class="absolute -inset-2 bg-gray-800/20 rounded-full blur-md"></div>
              </div>
              <div class="ml-4">
                <span class="block text-sm font-medium transition-colors"
                  :class="[activeSection === 'personal' ? 'text-gray-800' : 'text-gray-500']">
                  Étape 1
                </span>
                <span class="block text-lg font-semibold transition-colors"
                  :class="[activeSection === 'personal' ? 'text-gray-800' : 'text-gray-500']">
                  Informations Personnelles
                </span>
              </div>
            </div>
            
            <!-- Progress Line -->
            <div class="flex-1 h-1 mx-4 rounded-full bg-gray-200 relative overflow-hidden">
              <div class="h-full bg-gradient-to-r from-gray-800 to-gray-600 rounded-full transition-all duration-500"
                :class="[activeSection === 'architect' ? 'w-full' : 'w-0']"></div>
            </div>
            
            <div class="flex items-center group">
              <div class="relative">
                <div class="w-12 h-12 rounded-full flex items-center justify-center text-sm font-bold transition-all duration-300 shadow-lg"
                  :class="[activeSection === 'architect' ? 'bg-gradient-to-r from-gray-800 to-gray-700 text-white scale-110' : 'bg-white text-gray-400 border-2 border-gray-200']">
                  <i class="fas fa-drafting-compass"></i>
                </div>
                <div v-if="activeSection === 'architect'" class="absolute -inset-2 bg-gray-800/20 rounded-full blur-md"></div>
              </div>
              <div class="ml-4">
                <span class="block text-sm font-medium transition-colors"
                  :class="[activeSection === 'architect' ? 'text-gray-800' : 'text-gray-500']">
                  Étape 2
                </span>
                <span class="block text-lg font-semibold transition-colors"
                  :class="[activeSection === 'architect' ? 'text-gray-800' : 'text-gray-500']">
                  Profil Architecte
                </span>
              </div>
            </div>
          </div>
        </div>

        <!-- Personal Information Section -->
        <div v-if="activeSection === 'personal'" class="bg-white rounded-lg shadow-md p-8">
          <h2 class="text-2xl font-bold mb-6 text-gray-800">Informations Personnelles</h2>
          
          <form @submit.prevent="nextStep" class="space-y-6">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
              <!-- Name -->
              <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Nom complet *</label>
                <input type="text" v-model="formData.name" required
                  class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-gray-800 focus:border-transparent">
              </div>

              <!-- Email -->
              <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Email *</label>
                <input type="email" v-model="formData.email" required
                  class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-gray-800 focus:border-transparent">
              </div>

              <!-- Phone -->
              <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Téléphone *</label>
                <input type="tel" v-model="formData.phone" required
                  class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-gray-800 focus:border-transparent">
              </div>

              <!-- Address -->
              <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Adresse *</label>
                <input type="text" v-model="formData.address" required
                  class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-gray-800 focus:border-transparent">
              </div>

              <!-- City -->
              <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Ville *</label>
                <input type="text" v-model="formData.city" required
                  class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-gray-800 focus:border-transparent">
              </div>

              <!-- Country -->
              <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Pays *</label>
                <input type="text" v-model="formData.country" required
                  class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-gray-800 focus:border-transparent">
              </div>

              <!-- Postal Code -->
              <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Code postal *</label>
                <input type="text" v-model="formData.postal_code" required
                  class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-gray-800 focus:border-transparent">
              </div>

              <!-- Birth Date -->
              <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Date de naissance *</label>
                <input type="date" v-model="formData.birth_date" required
                  class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-gray-800 focus:border-transparent">
              </div>

              <!-- Gender -->
              <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Genre *</label>
                <select v-model="formData.gender" required
                  class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-gray-800 focus:border-transparent">
                  <option value="">Sélectionner</option>
                  <option value="male">Homme</option>
                  <option value="female">Femme</option>
                  <option value="other">Autre</option>
                </select>
              </div>

              <!-- Photo -->
              <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Photo de profil</label>
                <input type="file" @change="handlePhotoUpload" accept="image/*"
                  class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-gray-800 focus:border-transparent">
              </div>

              <!-- Password -->
              <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Mot de passe *</label>
                <input type="password" v-model="formData.password" required
                  class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-gray-800 focus:border-transparent">
              </div>

              <!-- Password Confirmation -->
              <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Confirmer le mot de passe *</label>
                <input type="password" v-model="formData.password_confirmation" required
                  class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-gray-800 focus:border-transparent">
              </div>
            </div>

            <div class="flex justify-end">
              <button type="submit" 
                class="px-8 py-3 bg-gray-800 text-white font-medium rounded-lg hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-gray-800 focus:ring-offset-2">
                Suivant
              </button>
            </div>
          </form>
        </div>

        <!-- Architect Profile Section with Enhanced Design -->
        <div v-if="activeSection === 'architect'" class="bg-white rounded-3xl shadow-2xl p-10 border border-gray-100 backdrop-blur-sm">
          <div class="text-center mb-8">
            <div class="inline-flex items-center justify-center w-16 h-16 bg-gradient-to-r from-gray-800 to-gray-700 rounded-2xl mb-4">
              <i class="fas fa-drafting-compass text-2xl text-white"></i>
            </div>
            <h2 class="text-3xl font-bold text-gray-800 mb-2">Profil Architecte</h2>
            <p class="text-gray-600">Complétez votre profil professionnel</p>
          </div>
          
          <form @submit.prevent="registerArchitect" class="space-y-8">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
              <!-- License Number -->
              <div class="group">
                <label class="block text-sm font-semibold text-gray-700 mb-3 flex items-center">
                  <i class="fas fa-certificate mr-2 text-gray-500"></i>
                  Numéro de licence *
                </label>
                <input type="text" v-model="formData.license_number" required
                  class="w-full px-6 py-4 rounded-xl border-2 border-gray-200 focus:ring-4 focus:ring-gray-800/20 focus:border-gray-800 transition-all duration-300 bg-gray-50/50 hover:bg-white group-hover:border-gray-300">
              </div>

              <!-- Years of Experience -->
              <div class="group">
                <label class="block text-sm font-semibold text-gray-700 mb-3 flex items-center">
                  <i class="fas fa-clock mr-2 text-gray-500"></i>
                  Années d'expérience *
                </label>
                <input type="number" v-model="formData.years_of_experience" min="0" required
                  class="w-full px-6 py-4 rounded-xl border-2 border-gray-200 focus:ring-4 focus:ring-gray-800/20 focus:border-gray-800 transition-all duration-300 bg-gray-50/50 hover:bg-white group-hover:border-gray-300">
              </div>

              <!-- Hourly Rate -->
              <div class="group">
                <label class="block text-sm font-semibold text-gray-700 mb-3 flex items-center">
                  <i class="fas fa-euro-sign mr-2 text-gray-500"></i>
                  Tarif horaire (€)
                </label>
                <input type="number" v-model="formData.hourly_rate" min="0" step="0.01"
                  class="w-full px-6 py-4 rounded-xl border-2 border-gray-200 focus:ring-4 focus:ring-gray-800/20 focus:border-gray-800 transition-all duration-300 bg-gray-50/50 hover:bg-white group-hover:border-gray-300">
              </div>

              <!-- Portfolio URL -->
              <div class="group">
                <label class="block text-sm font-semibold text-gray-700 mb-3 flex items-center">
                  <i class="fas fa-portfolio mr-2 text-gray-500"></i>
                  Portfolio URL
                </label>
                <input type="url" v-model="formData.portfolio_url"
                  class="w-full px-6 py-4 rounded-xl border-2 border-gray-200 focus:ring-4 focus:ring-gray-800/20 focus:border-gray-800 transition-all duration-300 bg-gray-50/50 hover:bg-white group-hover:border-gray-300">
              </div>

              <!-- Website -->
              <div class="group">
                <label class="block text-sm font-semibold text-gray-700 mb-3 flex items-center">
                  <i class="fas fa-globe mr-2 text-gray-500"></i>
                  Site web
                </label>
                <input type="url" v-model="formData.website"
                  class="w-full px-6 py-4 rounded-xl border-2 border-gray-200 focus:ring-4 focus:ring-gray-800/20 focus:border-gray-800 transition-all duration-300 bg-gray-50/50 hover:bg-white group-hover:border-gray-300">
              </div>

              <!-- LinkedIn -->
              <div class="group">
                <label class="block text-sm font-semibold text-gray-700 mb-3 flex items-center">
                  <i class="fab fa-linkedin mr-2 text-gray-500"></i>
                  LinkedIn
                </label>
                <input type="url" v-model="formData.linkedin"
                  class="w-full px-6 py-4 rounded-xl border-2 border-gray-200 focus:ring-4 focus:ring-gray-800/20 focus:border-gray-800 transition-all duration-300 bg-gray-50/50 hover:bg-white group-hover:border-gray-300">
              </div>
            </div>

            <!-- Specializations -->
            <div class="group">
              <label class="block text-sm font-semibold text-gray-700 mb-3 flex items-center">
                <i class="fas fa-tools mr-2 text-gray-500"></i>
                Spécialisations
              </label>
              <div class="grid grid-cols-2 md:grid-cols-4 gap-3">
                <div v-for="specialization in availableSpecializations" :key="specialization" 
                     class="flex items-center">
                  <input type="checkbox" :id="specialization" :value="specialization" 
                         v-model="formData.specializations"
                         class="w-4 h-4 text-gray-800 bg-gray-100 border-gray-300 rounded focus:ring-gray-800 focus:ring-2">
                  <label :for="specialization" class="ml-2 text-sm text-gray-700">{{ specialization }}</label>
                </div>
              </div>
            </div>

            <div class="flex justify-between items-center pt-6">
              <button type="button" @click="activeSection = 'personal'"
                class="group px-8 py-4 border-2 border-gray-300 text-gray-700 font-semibold rounded-xl hover:bg-gray-50 hover:border-gray-400 focus:outline-none focus:ring-4 focus:ring-gray-300/30 transition-all duration-300">
                <span class="flex items-center">
                  <i class="fas fa-arrow-left mr-2 group-hover:-translate-x-1 transition-transform"></i>
                  Retour
                </span>
              </button>
              <button type="submit" :disabled="loading"
                class="group relative px-10 py-4 bg-gradient-to-r from-gray-800 to-gray-700 text-white font-semibold rounded-xl hover:from-gray-700 hover:to-gray-600 focus:outline-none focus:ring-4 focus:ring-gray-800/30 transform hover:scale-105 transition-all duration-300 shadow-xl hover:shadow-2xl disabled:opacity-70 disabled:cursor-not-allowed disabled:transform-none">
                <span class="flex items-center">
                  <i v-if="loading" class="fas fa-spinner fa-spin mr-2"></i>
                  <i v-else class="fas fa-check mr-2"></i>
                  {{ loading ? 'Inscription en cours...' : 'Créer mon compte' }}
                </span>
              </button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import authApi from '@/api/auth.js';

export default {
  name: 'RegisterArchitect',
  data() {
    return {
      activeSection: 'personal',
      loading: false,
      availableSpecializations: [
        'Design résidentiel',
        'Design commercial',
        'Design d\'intérieur moderne',
        'Design traditionnel',
        'Design écologique',
        'Rénovation',
        'Aménagement d\'espaces',
        'Décoration'
      ],
      formData: {
        // Personal Information
        name: '',
        email: '',
        phone: '',
        address: '',
        city: '',
        country: '',
        postal_code: '',
        birth_date: '',
        gender: '',
        photo: null,
        
        // Security
        password: '',
        password_confirmation: '',
        
        // Architect Profile
        license_number: '',
        years_of_experience: '',
        specializations: [],
        education: [{ degree: '', institution: '', year: '' }],
        hourly_rate: '',
        portfolio_url: '',
        website: '',
        linkedin: '',
        verification_documents: []
      }
    };
  },
  methods: {
    handlePhotoUpload(event) {
      this.formData.photo = event.target.files[0];
    },
    
    handleDocumentUpload(event) {
      this.formData.verification_documents = Array.from(event.target.files);
    },
    
    addEducation() {
      this.formData.education.push({ degree: '', institution: '', year: '' });
    },
    
    nextStep() {
      // Validate personal information
      if (!this.formData.name || !this.formData.email || !this.formData.phone || 
          !this.formData.address || !this.formData.city || !this.formData.country || 
          !this.formData.postal_code || !this.formData.birth_date || !this.formData.gender ||
          !this.formData.password || !this.formData.password_confirmation) {
        alert('Veuillez remplir tous les champs obligatoires');
        return;
      }

      if (this.formData.password !== this.formData.password_confirmation) {
        alert('Les mots de passe ne correspondent pas');
        return;
      }
      
      this.activeSection = 'architect';
    },
    
    async registerArchitect() {
      this.loading = true;
      
      try {
        const formData = new FormData();

        // Add all form fields to FormData
        Object.keys(this.formData).forEach(key => {
          if (key === 'specializations') {
            formData.append(key, JSON.stringify(this.formData[key]));
          } else if (key === 'education') {
            formData.append(key, JSON.stringify(this.formData[key]));
          } else if (key === 'verification_documents') {
            this.formData[key].forEach((file, index) => {
              formData.append(`verification_documents[${index}]`, file);
            });
          } else if (this.formData[key] !== null && this.formData[key] !== '') {
            formData.append(key, this.formData[key]);
          }
        });
        
        const response = await authApi.registerArchitect(formData);

        if (response.status === 201) {
          alert('Inscription réussie! Votre compte sera vérifié par l\'administrateur avant activation.');
          this.$router.push('/login');
        }
      } catch (error) {
        console.error('Registration error:', error);
        if (error.response && error.response.data && error.response.data.errors) {
          const errors = error.response.data.errors;
          let errorMessage = 'Erreurs de validation:\n';
          Object.keys(errors).forEach(key => {
            errorMessage += `- ${errors[key][0]}\n`;
          });
          alert(errorMessage);
        } else {
          alert('Erreur lors de l\'inscription. Veuillez réessayer.');
        }
      } finally {
        this.loading = false;
      }
    }
  }
};
</script>

