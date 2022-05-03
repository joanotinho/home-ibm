require('./bootstrap');

import {menuButton} from "./scripts/menuButton.js";
import {plusMinusButton} from "./scripts/plusMinusButton.js";
import {filter} from "./scripts/filter.js";
import {ckeditor} from "./scripts/ckeditor.js";
import {renderForm} from "./scripts/form.js";
import {closeElement} from "./scripts/closeElement.js";
import {productDescription} from "./scripts/productDescription.js";
import {notification} from "./scripts/notification.js";

menuButton();
plusMinusButton();
filter();
renderForm();
ckeditor();
closeElement();
productDescription();
notification();