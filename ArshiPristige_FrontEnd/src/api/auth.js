import axios from 'axios';

const api = 'http://127.0.0.1:8000/api';

export default {
  login(data) {
    return axios.post(`${api}/login`, data);
  },

  registerClient(data) {
    return axios.post(`${api}/register/client`, data, {
      headers: {
        'Content-Type': 'multipart/form-data'
      }
    });
  },

  registerArchitect(data) {
    return axios.post(`${api}/register/architect`, data, {
      headers: {
        'Content-Type': 'multipart/form-data'
      }
    });
  },

  logout(token) {
    return axios.post(`${api}/logout`, null, {
      headers: {
        Authorization: `Bearer ${token}`
      }
    });
  }
};


