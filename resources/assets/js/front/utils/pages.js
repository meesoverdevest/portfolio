import PageHome from '../containers/pages/home';

export const HOME = 'HOME'

let map = {
  [HOME]: PageHome,
};

let get_page = (key) => (map[key]);

export { get_page };