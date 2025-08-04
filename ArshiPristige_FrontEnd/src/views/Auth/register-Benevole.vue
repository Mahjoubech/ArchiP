
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
            <i class="fas fa-user-plus text-3xl text-white"></i>
          </div>
          <h1 class="text-5xl font-bold mb-6 bg-gradient-to-r from-white to-gray-200 bg-clip-text text-transparent">
            Inscription Client
          </h1>
          <p class="text-xl opacity-90 max-w-2xl mx-auto leading-relaxed">
            Créez votre compte et commencez votre projet d'architecture d'intérieur avec nos experts
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
                :class="[activeSection === 'client' ? 'w-full' : 'w-0']"></div>
            </div>
            
            <div class="flex items-center group">
              <div class="relative">
                <div class="w-12 h-12 rounded-full flex items-center justify-center text-sm font-bold transition-all duration-300 shadow-lg"
                  :class="[activeSection === 'client' ? 'bg-gradient-to-r from-gray-800 to-gray-700 text-white scale-110' : 'bg-white text-gray-400 border-2 border-gray-200']">
                  <i class="fas fa-briefcase"></i>
                </div>
                <div v-if="activeSection === 'client'" class="absolute -inset-2 bg-gray-800/20 rounded-full blur-md"></div>
              </div>
              <div class="ml-4">
                <span class="block text-sm font-medium transition-colors"
                  :class="[activeSection === 'client' ? 'text-gray-800' : 'text-gray-500']">
                  Étape 2
                </span>
                <span class="block text-lg font-semibold transition-colors"
                  :class="[activeSection === 'client' ? 'text-gray-800' : 'text-gray-500']">
                  Profil Client
                </span>
              </div>
            </div>
          </div>
        </div>

        <!-- Personal Information Section with Enhanced Design -->
        <div v-if="activeSection === 'personal'" class="bg-white rounded-3xl shadow-2xl p-10 border border-gray-100 backdrop-blur-sm">
          <div class="text-center mb-8">
            <div class="inline-flex items-center justify-center w-16 h-16 bg-gradient-to-r from-gray-800 to-gray-700 rounded-2xl mb-4">
              <i class="fas fa-user text-2xl text-white"></i>
            </div>
            <h2 class="text-3xl font-bold text-gray-800 mb-2">Informations Personnelles</h2>
            <p class="text-gray-600">Renseignez vos informations de base</p>
          </div>
          
          <form @submit.prevent="nextStep" class="space-y-8">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
              <!-- Name -->
              <div class="group">
                <label class="block text-sm font-semibold text-gray-700 mb-3 flex items-center">
                  <i class="fas fa-user mr-2 text-gray-500"></i>
                  Nom complet *
                </label>
                <input type="text" v-model="formData.name" required
                  class="w-full px-6 py-4 rounded-xl border-2 border-gray-200 focus:ring-4 focus:ring-gray-800/20 focus:border-gray-800 transition-all duration-300 bg-gray-50/50 hover:bg-white group-hover:border-gray-300">
              </div>

              <!-- Email -->
              <div class="group">
                <label class="block text-sm font-semibold text-gray-700 mb-3 flex items-center">
                  <i class="fas fa-envelope mr-2 text-gray-500"></i>
                  Email *
                </label>
                <input type="email" v-model="formData.email" required
                  class="w-full px-6 py-4 rounded-xl border-2 border-gray-200 focus:ring-4 focus:ring-gray-800/20 focus:border-gray-800 transition-all duration-300 bg-gray-50/50 hover:bg-white group-hover:border-gray-300">
              </div>

              <!-- Phone -->
              <div class="group">
                <label class="block text-sm font-semibold text-gray-700 mb-3 flex items-center">
                  <i class="fas fa-phone mr-2 text-gray-500"></i>
                  Téléphone *
                </label>
                <input type="tel" v-model="formData.phone" required
                  class="w-full px-6 py-4 rounded-xl border-2 border-gray-200 focus:ring-4 focus:ring-gray-800/20 focus:border-gray-800 transition-all duration-300 bg-gray-50/50 hover:bg-white group-hover:border-gray-300">
              </div>

              <!-- Address -->
              <div class="group">
                <label class="block text-sm font-semibold text-gray-700 mb-3 flex items-center">
                  <i class="fas fa-map-marker-alt mr-2 text-gray-500"></i>
                  Adresse *
                </label>
                <input type="text" v-model="formData.address" required
                  class="w-full px-6 py-4 rounded-xl border-2 border-gray-200 focus:ring-4 focus:ring-gray-800/20 focus:border-gray-800 transition-all duration-300 bg-gray-50/50 hover:bg-white group-hover:border-gray-300">
              </div>

              <!-- City -->
              <div class="group">
                <label class="block text-sm font-semibold text-gray-700 mb-3 flex items-center">
                  <i class="fas fa-city mr-2 text-gray-500"></i>
                  Ville *
                </label>
                <input type="text" v-model="formData.city" required
                  class="w-full px-6 py-4 rounded-xl border-2 border-gray-200 focus:ring-4 focus:ring-gray-800/20 focus:border-gray-800 transition-all duration-300 bg-gray-50/50 hover:bg-white group-hover:border-gray-300">
              </div>

              <!-- Country -->
              <div class="group">
                <label class="block text-sm font-semibold text-gray-700 mb-3 flex items-center">
                  <i class="fas fa-globe mr-2 text-gray-500"></i>
                  Pays *
                </label>
                <select v-model="formData.country" required
                  class="w-full px-6 py-4 rounded-xl border-2 border-gray-200 focus:ring-4 focus:ring-gray-800/20 focus:border-gray-800 transition-all duration-300 bg-gray-50/50 hover:bg-white group-hover:border-gray-300">
                  <option value="">Sélectionner un pays</option>
                  <option value="Morocco">Maroc</option>
                  <option value="France">France</option>
                  <option value="Canada">Canada</option>
                  <option value="Other">Autre</option>
                </select>
              </div>

              <!-- Postal Code -->
              <div class="group">
                <label class="block text-sm font-semibold text-gray-700 mb-3 flex items-center">
                  <i class="fas fa-mail-bulk mr-2 text-gray-500"></i>
                  Code postal *
                </label>
                <input type="text" v-model="formData.postal_code" required
                  class="w-full px-6 py-4 rounded-xl border-2 border-gray-200 focus:ring-4 focus:ring-gray-800/20 focus:border-gray-800 transition-all duration-300 bg-gray-50/50 hover:bg-white group-hover:border-gray-300">
              </div>

              <!-- Birth Date -->
              <div class="group">
                <label class="block text-sm font-semibold text-gray-700 mb-3 flex items-center">
                  <i class="fas fa-calendar mr-2 text-gray-500"></i>
                  Date de naissance *
                </label>
                <input type="date" v-model="formData.birth_date" required
                  class="w-full px-6 py-4 rounded-xl border-2 border-gray-200 focus:ring-4 focus:ring-gray-800/20 focus:border-gray-800 transition-all duration-300 bg-gray-50/50 hover:bg-white group-hover:border-gray-300">
              </div>

              <!-- Gender -->
              <div class="group">
                <label class="block text-sm font-semibold text-gray-700 mb-3 flex items-center">
                  <i class="fas fa-venus-mars mr-2 text-gray-500"></i>
                  Genre *
                </label>
                <select v-model="formData.gender" required
                  class="w-full px-6 py-4 rounded-xl border-2 border-gray-200 focus:ring-4 focus:ring-gray-800/20 focus:border-gray-800 transition-all duration-300 bg-gray-50/50 hover:bg-white group-hover:border-gray-300">
                  <option value="">Sélectionner</option>
                  <option value="male">Homme</option>
                  <option value="female">Femme</option>
                  <option value="other">Autre</option>
                </select>
              </div>

              <!-- Photo -->
              <div class="group">
                <label class="block text-sm font-semibold text-gray-700 mb-3 flex items-center">
                  <i class="fas fa-camera mr-2 text-gray-500"></i>
                  Photo de profil
                </label>
                <div class="relative">
                  <input type="file" @change="handlePhotoUpload" accept="image/*"
                    class="w-full px-6 py-4 rounded-xl border-2 border-gray-200 focus:ring-4 focus:ring-gray-800/20 focus:border-gray-800 transition-all duration-300 bg-gray-50/50 hover:bg-white group-hover:border-gray-300 file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:bg-gray-800 file:text-white file:font-medium hover:file:bg-gray-700">
                </div>
              </div>

              <!-- Password -->
              <div class="group">
                <label class="block text-sm font-semibold text-gray-700 mb-3 flex items-center">
                  <i class="fas fa-lock mr-2 text-gray-500"></i>
                  Mot de passe *
                </label>
                <input type="password" v-model="formData.password" required
                  class="w-full px-6 py-4 rounded-xl border-2 border-gray-200 focus:ring-4 focus:ring-gray-800/20 focus:border-gray-800 transition-all duration-300 bg-gray-50/50 hover:bg-white group-hover:border-gray-300">
              </div>

              <!-- Password Confirmation -->
              <div class="group">
                <label class="block text-sm font-semibold text-gray-700 mb-3 flex items-center">
                  <i class="fas fa-lock mr-2 text-gray-500"></i>
                  Confirmer le mot de passe *
                </label>
                <input type="password" v-model="formData.password_confirmation" required
                  class="w-full px-6 py-4 rounded-xl border-2 border-gray-200 focus:ring-4 focus:ring-gray-800/20 focus:border-gray-800 transition-all duration-300 bg-gray-50/50 hover:bg-white group-hover:border-gray-300">
              </div>
            </div>

            <div class="flex justify-end pt-6">
              <button type="submit" 
                class="group relative px-10 py-4 bg-gradient-to-r from-gray-800 to-gray-700 text-white font-semibold rounded-xl hover:from-gray-700 hover:to-gray-600 focus:outline-none focus:ring-4 focus:ring-gray-800/30 transform hover:scale-105 transition-all duration-300 shadow-xl hover:shadow-2xl">
                <span class="flex items-center">
                  Suivant
                  <i class="fas fa-arrow-right ml-2 group-hover:translate-x-1 transition-transform"></i>
                </span>
              </button>
            </div>
          </form>
        </div>

        <!-- Client Profile Section with Enhanced Design -->
        <div v-if="activeSection === 'client'" class="bg-white rounded-3xl shadow-2xl p-10 border border-gray-100 backdrop-blur-sm">
          <div class="text-center mb-8">
            <div class="inline-flex items-center justify-center w-16 h-16 bg-gradient-to-r from-gray-800 to-gray-700 rounded-2xl mb-4">
              <i class="fas fa-briefcase text-2xl text-white"></i>
            </div>
            <h2 class="text-3xl font-bold text-gray-800 mb-2">Profil Client</h2>
            <p class="text-gray-600">Complétez votre profil professionnel</p>
          </div>
          
          <form @submit.prevent="registerClient" class="space-y-8">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
              <!-- Company Name -->
              <div class="group">
                <label class="block text-sm font-semibold text-gray-700 mb-3 flex items-center">
                  <i class="fas fa-building mr-2 text-gray-500"></i>
                  Nom de l'entreprise
                </label>
                <input type="text" v-model="formData.company_name"
                  class="w-full px-6 py-4 rounded-xl border-2 border-gray-200 focus:ring-4 focus:ring-gray-800/20 focus:border-gray-800 transition-all duration-300 bg-gray-50/50 hover:bg-white group-hover:border-gray-300">
              </div>

              <!-- Company Size -->
              <div class="group">
                <label class="block text-sm font-semibold text-gray-700 mb-3 flex items-center">
                  <i class="fas fa-users mr-2 text-gray-500"></i>
                  Taille de l'entreprise
                </label>
                <select v-model="formData.company_size"
                  class="w-full px-6 py-4 rounded-xl border-2 border-gray-200 focus:ring-4 focus:ring-gray-800/20 focus:border-gray-800 transition-all duration-300 bg-gray-50/50 hover:bg-white group-hover:border-gray-300">
                  <option value="">Sélectionner</option>
                  <option value="1-10">1-10 employés</option>
                  <option value="11-50">11-50 employés</option>
                  <option value="51-200">51-200 employés</option>
                  <option value="200+">200+ employés</option>
                </select>
              </div>

              <!-- Industry -->
              <div class="group">
                <label class="block text-sm font-semibold text-gray-700 mb-3 flex items-center">
                  <i class="fas fa-industry mr-2 text-gray-500"></i>
                  Secteur d'activité
                </label>
                <select v-model="formData.industry"
                  class="w-full px-6 py-4 rounded-xl border-2 border-gray-200 focus:ring-4 focus:ring-gray-800/20 focus:border-gray-800 transition-all duration-300 bg-gray-50/50 hover:bg-white group-hover:border-gray-300">
                  <option value="">Sélectionner</option>
                  <option value="technology">Technologie</option>
                  <option value="finance">Finance</option>
                  <option value="healthcare">Santé</option>
                  <option value="retail">Commerce</option>
                  <option value="other">Autre</option>
                </select>
              </div>

              <!-- Budget Range -->
              <div class="group">
                <label class="block text-sm font-semibold text-gray-700 mb-3 flex items-center">
                  <i class="fas fa-dollar-sign mr-2 text-gray-500"></i>
                  Budget estimé
                </label>
                <select v-model="formData.budget_range"
                  class="w-full px-6 py-4 rounded-xl border-2 border-gray-200 focus:ring-4 focus:ring-gray-800/20 focus:border-gray-800 transition-all duration-300 bg-gray-50/50 hover:bg-white group-hover:border-gray-300">
                  <option value="">Sélectionner</option>
                  <option value="5000-15000">5 000€ - 15 000€</option>
                  <option value="15000-30000">15 000€ - 30 000€</option>
                  <option value="30000-50000">30 000€ - 50 000€</option>
                  <option value="50000+">50 000€+</option>
                </select>
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
  name: 'RegisterClient',
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
        
        // Client Profile
        company_name: '',
        company_size: '',
        industry: '',
        budget_range: '',
        website: '',
        linkedin: ''
      }
    };
  },
  methods: {
    handlePhotoUpload(event) {
      this.formData.photo = event.target.files[0];
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
      
      this.activeSection = 'client';
    },
    
    async registerClient() {
      this.loading = true;
      
      try {
        const formData = new FormData();

        // Add all form fields to FormData
        Object.keys(this.formData).forEach(key => {
          if (this.formData[key] !== null && this.formData[key] !== '') {
            formData.append(key, this.formData[key]);
          }
        });
        
        const response = await authApi.registerClient(formData);

        if (response.status === 201) {
          alert('Inscription réussie! Vous pouvez maintenant vous connecter.');
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




