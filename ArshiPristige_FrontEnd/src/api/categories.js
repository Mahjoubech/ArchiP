import axios from 'axios';

const api = 'http://127.0.0.1:8000/api';

export default {
  // Public route
  getAllCategories() {
    return axios.get(`${api}/categories`);
  },

  // Admin routes
  getAdminCategories(token, page = 1, perPage = 10) {
    return axios.get(`${api}/admin/categories?page=${page}&per_page=${perPage}`, {
      headers: {
        Authorization: `Bearer ${token}`,
      }
    });
  },

  addCategory(token, categoryData) {
    return axios.post(`${api}/admin/categories`, 
      categoryData,
      {
        headers: {
          Authorization: `Bearer ${token}`,
        }
      }
    );
  },

  updateCategory(token, categoryId, categoryData) {
    return axios.put(`${api}/admin/categories/${categoryId}`, 
      categoryData,
      {
        headers: {
          Authorization: `Bearer ${token}`,
        }
      }
    );
  },

  deleteCategory(token, categoryId) {
    return axios.delete(`${api}/admin/categories/${categoryId}`, {
      headers: {
        Authorization: `Bearer ${token}`,
      }
    });
  }
};
