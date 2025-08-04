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

  authStatus(token) {
    return axios.get(`${api}/auth-status`, {
      headers: {
        Authorization: `Bearer ${token}`
      }
    });
  },

  logout(token) {
    return axios.post(`${api}/logout`, null, {
      headers: {
        Authorization: `Bearer ${token}`
      }
    });
  },

  // Admin routes
  getAllArchitects(token, page = 1) {
    return axios.get(`${api}/admin/architects?page=${page}`, {
      headers: {
        Authorization: `Bearer ${token}`
      }
    });
  },

  getAllClients(token, page = 1) {
    return axios.get(`${api}/admin/clients?page=${page}`, {
      headers: {
        Authorization: `Bearer ${token}`
      }
    });
  },

  verifyArchitect(token, id) {
    return axios.put(`${api}/admin/architects/${id}/verify`, {}, {
      headers: {
        Authorization: `Bearer ${token}`
      }
    });
  }
};

