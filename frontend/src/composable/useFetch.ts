import axios from 'axios';

export const useFetch = () => {
  const fetchReviewData = (isLoading : Boolean, id : number ,reviewList : []) => {
    isLoading = true;
    axios
        .get(`api/reviews/${id}`, { withCredentials: true })
        .then((response: { data: any; }) => {
          Object.assign(reviewList, response.data);
          isLoading = false;
        })
        .catch((err: any) => {
          console.log(err);
        });
  }
  const fetchProductData = (isLoading : Boolean,  id : number , productList: []) => {
    isLoading = true;
      axios
        .get(`api/products/${id}`, { withCredentials: true })
        .then((response: { data: any; }) => {
          Object.assign(productList, response.data);
          isLoading = false;
        })
        .catch((err: any) => {
          console.log(err);
        });
  }
  const fetchStoreData = (isLoading : Boolean,  id : number , storeData: []) => {
    isLoading = true;
      axios
        .get(`api/stores/${id}`, { withCredentials: true })
        .then((response: { data: any; }) => {
          Object.assign(storeData, response.data);
          isLoading = false;
        })
        .catch((err: any) => {
          console.log(err);
        });
  }
}