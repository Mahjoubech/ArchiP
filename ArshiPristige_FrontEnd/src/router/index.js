import { createRouter, createWebHistory } from 'vue-router';
import home from '../views/home.vue';
import opportunites from '../views/opportunities/show.vue';
import OpportuniteDetails from '../views/opportunities/details.vue';
import registerClient from '../views/Auth/register-Benevole.vue';
import registerArchitect from '../views/Auth/register-association.vue';
import auth_index from '../views/Auth/auth-index.vue';
import login from '../views/Auth/login.vue';
import profile from '../views/benevole/profile.vue';
import unauthorized from '../components/layout/unauthorized.vue';
import dashboard_opportunites from '../components/opportunites.vue';
import dashboard_profile from '../components/profile.vue';
import dashboard_benevole from '../views/association/Postulation/show.vue';
import dashboard_certification from '../views/association/certifications/show.vue';
import association_admin from '../views/admin/associations/show.vue';
import categorie_admin from '../views/admin/categories/show.vue';
import AllcertificationBenevole from '../views/benevole/certificationodal.vue';
import contacts_admin from '../views/admin/contacts/show.vue';
import contact from '../views/others/contact.vue';
import faq from '../views/others/faq.vue';
import apopos from '../views/others/apopos.vue';
import services from '../views/others/services.vue';
import benevoles from '../views/others/benevoles.vue';
import formation from '../views/others/formation.vue';
import association from '../views/others/association.vue';
import guide_juridique from '../views/others/guide_juridique.vue';
import Politique_confidentialite from '../views/others/Politique_confidentialite.vue';
import Conditions_dutilisation from '../views/others/Conditions_dutilisation.vue';
import dashboard from '../components/dashboard.vue';
import NotFound from '../components/layout/notFound.vue';
import authapi from "@/api/auth"; 

const routes = [
  { path: '/', name: 'home', component: home },
  { path: '/opportunites', name: 'opportunites', component: opportunites },
  { path: '/contact', name: 'contact', component: contact },
  { path: '/faq', name: 'faq', component: faq },
  { path: '/propos', name: 'apopos', component: apopos },
  { path: '/services', name: 'services', component: services },
  { path: '/Benevoles', name: 'benevoles', component: benevoles },
  { path: '/associations', name: 'association', component: association },
  { path: '/formations', name: 'formation', component: formation },
  { path: '/Conditions_dutilisation', name: 'Conditions_dutilisation', component: Conditions_dutilisation },
  { path: '/Politique_confidentialite', name: 'Politique_confidentialite', component: Politique_confidentialite },
  { path: '/guide-Juridique', name: 'guide_juridique', component: guide_juridique },
  { path: '/opportunites/:id', name: 'OpportuniteDetails', component: OpportuniteDetails, props: true },
  { path: '/register-benevole', name: 'RegisterClient', component: registerClient },
  { path: '/register-association', name: 'RegisterArchitect', component: registerArchitect },
  { path: '/register/', name: 'auth_index', component: auth_index, meta: { guestOnly: true } },
  { path: '/login/', name: 'login', component: login, meta: { guestOnly: true } },
  { path: '/profile/', name: 'profile', component: profile , meta: { requiresAuth: true, role: "benevole" } },
  { path: '/dashboard/', name: 'dashboard', component: dashboard, meta: { requiresAuth: true}},
  { path: '/unauthorized', name: 'unauthorized', component: unauthorized},
  { path: '/dashboard/opportunites', name: 'dashboard_opportunites', component: dashboard_opportunites, meta: { requiresAuth: true }},
  { path: '/dashboard/profile', name: 'dashboard_profile', component: dashboard_profile, meta: { requiresAuth: true }},
  { path: '/dashboard/benevoles', name: 'dashboard_benevole', component: dashboard_benevole, meta: { requiresAuth: true, role: "association" }},
  { path: '/dashboard/certifications', name: 'dashboard_certification', component: dashboard_certification, meta: { requiresAuth: true, role: "association" }},
  { path: '/certifications', name: 'AllcertificationBenevole', component: AllcertificationBenevole, meta: { requiresAuth: true, role: "benevole" }},
  { path: '/dashboard/associations', name: 'association_admin', component: association_admin, meta: { requiresAuth: true, role: "admin" }},
  { path: '/dashboard/associations', name: 'association_admin', component: association_admin, meta: { requiresAuth: true, role: "admin" }},
  { path: '/dashboard/categories', name: 'categorie_admin', component: categorie_admin, meta: { requiresAuth: true, role: "admin" }},
  { path: '/dashboard/contacts', name: 'contacts_admin', component: contacts_admin, meta: { requiresAuth: true, role: "admin" }},
  
  { path: '/:pathMatch(.*)*', name: 'not-found', component: NotFound }
];

const router = createRouter({
  history: createWebHistory(),
  routes
});

function getSessionStorage(name) {
  return sessionStorage.getItem(name);
}

router.beforeEach(async (to, from, next) => {
  if (to.meta.unauthorized !== undefined) {
    to.meta.unauthorized = false;
  }

  const token = getSessionStorage("authToken");
  
  if (token && to.meta.guestOnly) {
    try {
      const { data } = await authapi.authStatus(token);
      const user = data.user;
      
      if (user.role === "benevole") {
        return next('/profile');
      } else if (user.role === "association" || user.role === "admin") {
        return next('/dashboard');
      } else {
        return next('/');
      }
    } catch {
      sessionStorage.removeItem("authToken");
      return next();
    }
  }

  if (!to.meta.requiresAuth) return next();

  if (!token) return next("/login");

  try {
    const { data } = await authapi.authStatus(token);
    const user = data.user;

    if (to.meta.role && user.role !== to.meta.role) {
      return next('/unauthorized'); 
    }

    next();
  } catch {
    next("/login");
  }
});

export default router;
