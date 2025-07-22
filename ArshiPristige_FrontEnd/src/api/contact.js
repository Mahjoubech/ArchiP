import axios from 'axios';

const api = 'http://127.0.0.1:8000/api';

export default {
    sendMessage(data) {
        return axios.post(`${api}/contact`, data);
    },

    getAllMessages(token) {
        return axios.get(`${api}/dashboard/admin/contacts/all`, {
          headers: {
            'Authorization': `Bearer ${token}`
          }
        });
      },

      deleteAllMessages(token) {
        return axios.delete(`${api}/dashboard/admin/contacts/delete`, {
          headers: {
            'Authorization': `Bearer ${token}`
          }
        });
      }
};