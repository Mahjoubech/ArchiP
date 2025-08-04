<template>
  <div class="min-h-screen bg-gray-50">
    <!-- Hero Section -->
    <div class="relative bg-gray-800 text-white py-16">
      <div class="container mx-auto px-4">
          <div class="text-center">
          <h1 class="text-4xl font-bold mb-4">Inscription Architecte</h1>
          <p class="text-xl opacity-90">
            Créez votre compte entreprise et commencez vos projets d'architecture d'intérieur.
          </p>
        </div>
      </div>
    </div>

    <!-- Registration Form -->
    <div class="container mx-auto px-4 py-12">
      <div class="max-w-4xl mx-auto">
        <!-- Progress Steps -->
        <div class="mb-8">
          <div class="flex items-center justify-center space-x-8">
            <div class="flex items-center">
              <span class="w-8 h-8 rounded-full flex items-center justify-center text-sm font-medium transition-colors"
                :class="[activeSection === 'personal' ? 'bg-gray-800 text-white' : 'bg-gray-200 text-gray-600']">1</span>
              <span class="ml-2 text-sm font-medium transition-colors"
                :class="[activeSection === 'personal' ? 'text-gray-800' : 'text-gray-600']">
                        Informations Personnelles
              </span>
                    </div>
            <div class="flex items-center">
              <span class="w-8 h-8 rounded-full flex items-center justify-center text-sm font-medium transition-colors"
                :class="[activeSection === 'architect' ? 'bg-gray-800 text-white' : 'bg-gray-200 text-gray-600']">2</span>
              <span class="ml-2 text-sm font-medium transition-colors"
                :class="[activeSection === 'architect' ? 'text-gray-800' : 'text-gray-600']">
                Profil Architecte
              </span>
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
                  <option value="">Sélectionnez</option>
                  <option value="male">Homme</option>
                  <option value="female">Femme</option>
                  <option value="other">Autre</option>
                    </select>
                  </div>

              <!-- Address -->
              <div class="md:col-span-2">
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

              <!-- Photo -->
                  <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Photo de profil</label>
                <input type="file" @change="handlePhotoUpload" accept="image/*"
                  class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-gray-800 focus:border-transparent">
                  </div>
                  </div>

            <!-- Password Section -->
            <div class="border-t pt-6">
              <h3 class="text-lg font-semibold mb-4 text-gray-800">Sécurité du compte</h3>
              <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                  <div>
                  <label class="block text-sm font-medium text-gray-700 mb-2">Mot de passe *</label>
                  <input type="password" v-model="formData.password" required
                    class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-gray-800 focus:border-transparent">
                  </div>
                  <div>
                  <label class="block text-sm font-medium text-gray-700 mb-2">Confirmer le mot de passe *</label>
                  <input type="password" v-model="formData.password_confirmation" required
                    class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-gray-800 focus:border-transparent">
                </div>
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

        <!-- Architect Profile Section -->
        <div v-if="activeSection === 'architect'" class="bg-white rounded-lg shadow-md p-8">
          <h2 class="text-2xl font-bold mb-6 text-gray-800">Profil Architecte</h2>
          
          <form @submit.prevent="registerArchitect" class="space-y-6">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
              <!-- License Number -->
                        <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Numéro de licence *</label>
                <input type="text" v-model="formData.license_number" required
                  class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-gray-800 focus:border-transparent">
                        </div>

              <!-- Years of Experience -->
                        <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Années d'expérience *</label>
                <input type="number" v-model="formData.years_of_experience" min="0" required
                  class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-gray-800 focus:border-transparent">
              </div>
  
              <!-- Hourly Rate -->
              <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Taux horaire (MAD) *</label>
                <input type="number" v-model="formData.hourly_rate" min="0" step="0.01" required
                  class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-gray-800 focus:border-transparent">
              </div>

              <!-- Portfolio URL -->
              <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">URL du portfolio</label>
                <input type="url" v-model="formData.portfolio_url"
                  class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-gray-800 focus:border-transparent">
              </div>

              <!-- Website -->
              <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Site web</label>
                <input type="url" v-model="formData.website"
                  class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-gray-800 focus:border-transparent">
              </div>

              <!-- LinkedIn -->
              <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">LinkedIn</label>
                <input type="url" v-model="formData.linkedin"
                  class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-gray-800 focus:border-transparent">
              </div>
            </div>

            <!-- Specializations -->
            <div>
              <label class="block text-sm font-medium text-gray-700 mb-2">Spécialisations *</label>
              <div class="grid grid-cols-2 md:grid-cols-3 gap-4">
                <label v-for="spec in specializations" :key="spec.value" class="flex items-center space-x-2">
                  <input type="checkbox" :value="spec.value" v-model="formData.specializations" 
                    class="text-gray-800 focus:ring-gray-800">
                  <span class="text-sm">{{ spec.label }}</span>
                </label>
        </div>
      </div>
  
            <!-- Education -->
            <div>
              <label class="block text-sm font-medium text-gray-700 mb-2">Formation *</label>
              <div class="space-y-4">
                <div v-for="(edu, index) in formData.education" :key="index" class="grid grid-cols-1 md:grid-cols-3 gap-4">
                  <input type="text" v-model="edu.degree" placeholder="Diplôme" required
                    class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-gray-800 focus:border-transparent">
                  <input type="text" v-model="edu.institution" placeholder="Institution" required
                    class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-gray-800 focus:border-transparent">
                  <input type="number" v-model="edu.year" placeholder="Année" min="1950" max="2030" required
                    class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-gray-800 focus:border-transparent">
            </div>
                <button type="button" @click="addEducation" 
                  class="px-4 py-2 text-gray-600 border border-gray-300 rounded-lg hover:bg-gray-50">
                  + Ajouter une formation
                </button>
              </div>
            </div>

            <!-- Verification Documents -->
            <div>
              <label class="block text-sm font-medium text-gray-700 mb-2">Documents de vérification *</label>
              <p class="text-sm text-gray-600 mb-4">Veuillez fournir vos documents de licence et certifications</p>
              <input type="file" @change="handleDocumentsUpload" multiple accept=".pdf,.jpg,.jpeg,.png" required
                class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-gray-800 focus:border-transparent">
              <p class="text-xs text-gray-500 mt-2">Formats acceptés: PDF, JPG, PNG. Max 2MB par fichier</p>
          </div>
          
            <div class="flex justify-between">
              <button type="button" @click="activeSection = 'personal'"
                class="px-8 py-3 border border-gray-300 text-gray-700 font-medium rounded-lg hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-gray-800 focus:ring-offset-2">
                Retour
              </button>
              <button type="submit" :disabled="loading"
                class="px-8 py-3 bg-gray-800 text-white font-medium rounded-lg hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-gray-800 focus:ring-offset-2 disabled:opacity-50">
                {{ loading ? 'Inscription en cours...' : 'Créer mon compte' }}
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
      },
      specializations: [
        { value: 'residential', label: 'Résidentiel' },
        { value: 'commercial', label: 'Commercial' },
        { value: 'interior_design', label: 'Design d\'intérieur' },
        { value: 'renovation', label: 'Rénovation' },
        { value: 'landscape', label: 'Paysage' },
        { value: 'sustainable', label: 'Architecture durable' },
        { value: 'modern', label: 'Architecture moderne' },
        { value: 'traditional', label: 'Architecture traditionnelle' },
        { value: 'luxury', label: 'Luxe' },
        { value: 'minimalist', label: 'Minimaliste' }
      ]
      };
    },
    methods: {
    handlePhotoUpload(event) {
      this.formData.photo = event.target.files[0];
    },
    
    handleDocumentsUpload(event) {
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
  
        // Add personal information
        Object.keys(this.formData).forEach(key => {
          if (key === 'specializations' || key === 'education') {
            // Handle arrays
            if (this.formData[key] && this.formData[key].length > 0) {
              if (key === 'specializations') {
                this.formData[key].forEach(spec => {
                  formData.append(`${key}[]`, spec);
                });
              } else if (key === 'education') {
                formData.append(key, JSON.stringify(this.formData[key]));
              }
            }
          } else if (key === 'verification_documents') {
            // Handle file arrays
            if (this.formData[key] && this.formData[key].length > 0) {
              this.formData[key].forEach(file => {
                formData.append(`${key}[]`, file);
              });
            }
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
  
  <style scoped>
  @keyframes fadeIn {
    from {
      opacity: 0;
      transform: scale(0.9);
    }
    to {
      opacity: 1;
      transform: scale(1);
    }
  }
  
  .scale-100 {
    animation: fadeIn 0.3s ease-in-out;
  }
  
  .text-shadow {
    text-shadow: 0 1px 3px rgba(0, 0, 0, 0.3);
  }
  </style>