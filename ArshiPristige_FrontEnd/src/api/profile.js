import axios from 'axios';

const api = 'http://127.0.0.1:8000/api';

export default {
  // Client profile
  getClientProfile(token) {
    return axios.get(`${api}/client/profile`, {
      headers: {
        Authorization: `Bearer ${token}`
      }
    });
  },

  updateClientProfile(token, data) {
    return axios.put(`${api}/client/profile`, data, {
      headers: {
        Authorization: `Bearer ${token}`,
        'Content-Type': 'multipart/form-data'
      }
    });
  },

  // Architect profile
  getArchitectProfile(token) {
    return axios.get(`${api}/architect/profile`, {
      headers: {
        Authorization: `Bearer ${token}`
      }
    });
  },

  updateArchitectProfile(token, data) {
    return axios.put(`${api}/architect/profile`, data, {
      headers: {
        Authorization: `Bearer ${token}`,
        'Content-Type': 'multipart/form-data'
      }
    });
  },

  // Admin profile
  getAdminProfile(token) {
    return axios.get(`${api}/admin/profile`, {
      headers: {
        Authorization: `Bearer ${token}`
      }
    });
  },

  updateAdminProfile(token, data) {
    return axios.put(`${api}/admin/profile`, data, {
      headers: {
        Authorization: `Bearer ${token}`,
        'Content-Type': 'multipart/form-data'
      }
    });
  },

  // Common password update
  updatePassword(token, passwordData) {
    return axios.put(`${api}/profile/password`, passwordData, {
      headers: {
        Authorization: `Bearer ${token}`,
        'Content-Type': 'application/json'
      }
    });
  },

  resetPassword(token) {
    return axios.post(`${api}/profile/reset-password`, {}, {
      headers: {
        Authorization: `Bearer ${token}`,
        'Content-Type': 'application/json'
      }
    });
  }
};
