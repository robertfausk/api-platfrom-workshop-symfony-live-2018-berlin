import fetch from '../../utils/fetch';

export function error(error) {
  return {type: 'BOOK_SHOW_ERROR', error};
}

export function loading(loading) {
  return {type: 'BOOK_SHOW_LOADING', loading};
}

export function retrieved(retrieved) {
  return {type: 'BOOK_SHOW_RETRIEVED_SUCCESS', retrieved};
}

export function retrieve(id) {
  return (dispatch) => {
    dispatch(loading(true));

    return fetch(id)
      .then(response => response.json())
      .then(data => {
        dispatch(loading(false));
        dispatch(retrieved(data));
      })
      .catch(e => {
        dispatch(loading(false));
        dispatch(error(e.message));
      });
  };
}

export function reset() {
  return {type: 'BOOK_SHOW_RESET'};
}
