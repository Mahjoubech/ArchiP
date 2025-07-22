import { reactive } from 'vue';
import authapi from "@/api/auth";

export const authStore = reactive({
  isLoggedIn: false,
  role: null,   
  user: null,

  login(userData) {
    this.isLoggedIn = true;
    this.role = userData.role;
    this.user = userData;  
    localStorage.setItem('userData', JSON.stringify({
      isLoggedIn: true,
      role: userData.role,
      user: userData
    }));
  },

  async logout() {
    const token = sessionStorage.getItem('authToken');
    if (token) {
      try {
        await authapi.logout(token); 
      } catch (error) {
        console.error("Logout failed:", error);
      }
    }

    this.isLoggedIn = false;
    this.role = null;
    this.user = null;
    sessionStorage.removeItem('authToken');
    localStorage.removeItem('userData'); 
    document.cookie = "authToken=; expires=Thu, 17 Jan 2003 00:00:00 UTC; path=/;";
  },

  async initialize() {
    const storedData = localStorage.getItem('userData');
    if (storedData) {
      const userData = JSON.parse(storedData);
      this.isLoggedIn = userData.isLoggedIn;
      this.role = userData.role;
      this.user = userData.user;
    }

    const token = sessionStorage.getItem('authToken');
    if (token) {
      try {
        const { data } = await authapi.authStatus(token);
        this.login({
          role: data.user.role,
          ...data.user
        });
      } catch (error) {
        this.logout();
      }
    }
  }
});