import axios from 'axios';

const api = 'http://127.0.0.1:8000/api';

export default {
    addCertificationToBenevole(token, opportuniteId,benevoleId, certificationData) {
        return axios.post(`${api}/dashboard/opportunite/${opportuniteId}/certification/${benevoleId}`, certificationData, {
          headers: {
            'Authorization': `Bearer ${token}`,
          }
        });
      },

       getPostulationsByAssociationAccepted(token) {
          return axios.get(`${api}/dashboard/opportunite/postulations/accepted`, {
            headers: {
              Authorization: `Bearer ${token}`,
            },
          });
        },

        getCertificationBenevole(token){
            return axios.get(`${api}/benevole/Certififctaion`, {
                headers: {
                    Authorization: `Bearer ${token}`,
                },
        });
        }

        
}