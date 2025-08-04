import axios from 'axios';

const api = 'http://127.0.0.1:8000/api';

export default {
  // Public contact
  sendMessage(data) {
    return axios.post(`${api}/contact`, data);
  },

  // Admin contact management
  getAllMessages(token, page = 1) {
    return axios.get(`${api}/admin/contacts?page=${page}`, {
      headers: {
        'Authorization': `Bearer ${token}`
      }
    });
  },

  deleteMessage(token, id) {
    return axios.delete(`${api}/admin/contacts/${id}`, {
      headers: {
        'Authorization': `Bearer ${token}`
      }
    });
  },

  deleteAllMessages(token) {
    return axios.delete(`${api}/admin/contacts`, {
      headers: {
        'Authorization': `Bearer ${token}`
      }
    });
  }
};
