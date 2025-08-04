    <template>
  <div class="min-h-screen bg-gray-50">
    <!-- Hero Section -->
    <div class="relative bg-gray-800 text-white py-16">
      <div class="container mx-auto px-4">
                    <div class="text-center">
          <h1 class="text-4xl font-bold mb-4">Inscription Client Particulier</h1>
          <p class="text-xl opacity-90">
            Créez votre compte et commencez votre projet d'architecture d'intérieur
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
                :class="[activeSection === 'client' ? 'bg-gray-800 text-white' : 'bg-gray-200 text-gray-600']">2</span>
              <span class="ml-2 text-sm font-medium transition-colors"
                :class="[activeSection === 'client' ? 'text-gray-800' : 'text-gray-600']">
                Profil Client
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

        <!-- Client Profile Section -->
        <div v-if="activeSection === 'client'" class="bg-white rounded-lg shadow-md p-8">
          <h2 class="text-2xl font-bold mb-6 text-gray-800">Profil Client</h2>
          
          <form @submit.prevent="registerClient" class="space-y-6">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
              <!-- Company Name -->
                                    <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Nom de l'entreprise</label>
                <input type="text" v-model="formData.company_name"
                  class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-gray-800 focus:border-transparent">
                                    </div>

              <!-- Company Size -->
                                    <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Taille de l'entreprise</label>
                <select v-model="formData.company_size"
                  class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-gray-800 focus:border-transparent">
                  <option value="">Sélectionnez</option>
                  <option value="1-10">1-10 employés</option>
                  <option value="11-50">11-50 employés</option>
                  <option value="51-200">51-200 employés</option>
                  <option value="201+">201+ employés</option>
                                        </select>
                                    </div>

              <!-- Industry -->
              <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Secteur d'activité</label>
                <input type="text" v-model="formData.industry"
                  class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-gray-800 focus:border-transparent">
                                        </div>

              <!-- Budget Range -->
                                    <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Fourchette de budget</label>
                <select v-model="formData.budget_range"
                  class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-gray-800 focus:border-transparent">
                  <option value="">Sélectionnez</option>
                  <option value="< 10k">Moins de 10k MAD</option>
                  <option value="10k-50k">10k - 50k MAD</option>
                  <option value="50k-100k">50k - 100k MAD</option>
                  <option value="100k-500k">100k - 500k MAD</option>
                  <option value="> 500k">Plus de 500k MAD</option>
                                        </select>
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