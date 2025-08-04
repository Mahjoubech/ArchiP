import axios from 'axios';

const api = 'http://127.0.0.1:8000/api';

export default {
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
  }
};
