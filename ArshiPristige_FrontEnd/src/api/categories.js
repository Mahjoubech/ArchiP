import axios from 'axios';

const api = 'http://127.0.0.1:8000/api';

export default {
  getAllCategories() {
    return axios.get(`${api}/categories`);
  },

  addCategory(token, categoryData) {
    return axios.post(`${api}/admin/categories`, categoryData, {
      headers: {
        Authorization: `Bearer ${token}`,
      }
    });
  },

  updateCategory(token, categoryId, categoryData) {
    return axios.put(`${api}/admin/categories/${categoryId}`, categoryData, {
      headers: {
        Authorization: `Bearer ${token}`,
      }
    });
  },

  deleteCategory(token, categoryId) {
    return axios.delete(`${api}/admin/categories/${categoryId}`, {
      headers: {
        Authorization: `Bearer ${token}`,
      }
    });
  }
};
