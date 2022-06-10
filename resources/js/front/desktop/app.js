require('../bootstrap');

import {plusMinusButton} from "./scripts/plusMinusButton.js";
import {ckeditor} from "./scripts/ckeditor.js";
import {renderForm} from "./scripts/form.js";
import {closeElement} from "./scripts/closeElement.js";
import {tabs} from "./scripts/tabs.js";
import {savedChangesStatus} from "./scripts/savedChangesStatus.js";
import {events} from "./scripts/events.js";
import {faqs} from "./scripts/faqs.js";
import {renderProduct} from "./scripts/product.js";
import {menu} from "./scripts/menu.js";

plusMinusButton();
renderForm();
ckeditor();
closeElement();
tabs();
savedChangesStatus();
events();
faqs();
renderProduct();
menu();
