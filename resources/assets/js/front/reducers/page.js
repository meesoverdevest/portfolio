
import { HOME } from '../utils/pages'

import { SET_PAGE } from '../action_types/page'

function page(state = HOME, action) {
  switch (action.type) {
  case SET_PAGE:
    return action.page;
  default:
    return state;
  }
}

export { page };
