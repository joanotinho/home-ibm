require('../bootstrap');

import {menuButton} from "./scripts/menuButton.js";
import {plusMinusButton} from "./scripts/plusMinusButton.js";
import {ckeditor} from "./scripts/ckeditor.js";
import {renderForm} from "./scripts/form.js";
import {closeElement} from "./scripts/closeElement.js";
import {tabs} from "./scripts/tabs.js";
import {savedChangesStatus} from "./scripts/savedChangesStatus.js";
import {events} from "./scripts/events.js";

menuButton();
plusMinusButton();
renderForm();
ckeditor();
closeElement();
tabs();
savedChangesStatus();
events();