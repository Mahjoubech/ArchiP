<script setup>
import { useRoute } from 'vue-router';
import { computed } from 'vue';
import Header from './components/layout/Header.vue';
import Footer from './components/layout/Footer.vue';
import DashboardHeader from './components/layout/dashboardHeader.vue';
import Unauthorized from './components/layout/unauthorized.vue';
const route = useRoute();

const layoutType = computed(() => {
  const isDashboardPath = route.path === '/dashboard' || route.path.startsWith('/dashboard/');
  return isDashboardPath ? 'dashboard' : 'default';
});

const useDefaultLayout = computed(() => layoutType.value === 'default');
const useDashboardLayout = computed(() => layoutType.value === 'dashboard');
</script>

<template>
  <div>
    <Header v-if="useDefaultLayout" />
    <DashboardHeader v-if="useDashboardLayout" />
    
    <main :class="[useDashboardLayout ? 'dashboard-container' : 'default-container']">
      <Unauthorized v-if="route.meta.unauthorized" />
      <router-view v-else />
    </main>
    
    <Footer v-if="useDefaultLayout" />
  </div>
</template>

<style scoped>
.dashboard-container {
  padding: 0;
  margin-left: 0;
  transition: margin-left 0.3s;
}

@media (min-width: 1024px) {
  .dashboard-container {
    margin-left: 16rem;
  }
}

.default-container {
  min-height: calc(100vh - 160px);
  padding: 1rem;
}
</style>