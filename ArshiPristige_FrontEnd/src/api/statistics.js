import axios from 'axios';

const api = 'http://127.0.0.1:8000/api';

export default {
  // Client statistics
  getClientStatistics(token) {
    return axios.get(`${api}/client/statistics`, {
      headers: {
        Authorization: `Bearer ${token}`,
      }
    });
  },

  // Architect statistics
  getArchitectStatistics(token) {
    return axios.get(`${api}/architect/statistics`, {
      headers: {
        Authorization: `Bearer ${token}`,
      }
    });
  },

  // Admin statistics
  getAdminStatistics(token) {
    return axios.get(`${api}/admin/statistics`, {
      headers: {
        Authorization: `Bearer ${token}`,
      }
    });
  }
};