const vm = Vue.createApp({
  data() {
    return {
      message1: "Vous ne pouvez entrer que soit 1 soit 0",
      message2: "La plage de valeurs vont de 0 à 7",
      error1: false,
      error2: false,
      error3: false,
      error4: false,
    };
  },
  methods: {
    verify(e) {
      const inputElements = [...document.querySelectorAll("input.g1")];
      let ele = e.target;
      let val = ele.name.split("-");
      let index = val[1] * 1;

      if (e.target.value * 1 === 0 || e.target.value * 1 === 1) {
        this.error1 = false;
        ele.addEventListener("keyup", (e) => {
          // if the keycode is backspace & the current field is empty
          // focus the input before the current. Then the event happens
          // which will clear the "before" input box.
          if (e.keyCode === 8 && e.target.value === "")
            inputElements[Math.max(0, index - 1)].focus();
        });
        // if the keycode is backspace & the current field is empty
        // focus the input before the current. Then the event happens
        // which will clear the "before" input box.
        if (e.keyCode === 8 && e.target.value === "")
          inputElements[Math.max(0, index - 1)].focus();
        ele.addEventListener("input", (e) => {
          // take the first character of the input
          // this actually breaks if you input an emoji like 👨‍👩‍👧‍👦....
          // but I'm willing to overlook insane security code practices.
          const [first, ...rest] = e.target.value;
          e.target.value = first ?? ""; // first will be undefined when backspace was entered, so set the input to ""
          const lastInputBox = index === inputElements.length - 1;
          const didInsertContent = first !== undefined;
          if (didInsertContent && !lastInputBox && inputElements[index + 1]) {
            // continue to input the rest of the string
            inputElements[index + 1].focus();
            inputElements[index + 1].value = rest.join("");
            inputElements[index + 1].dispatchEvent(new Event("input"));
          }
        });

        // mini example on how to pull the data on submit of the form
        function onSubmit(e) {
          e.preventDefault();
          const code = inputElements.map(({ value }) => value).join("");
          console.log(code);
        }
      } else {
        this.error1 = true;
      }
    },
    verifyKeyPermute(e) {
      const inputElements = [...document.querySelectorAll("input.g2")];
      let ele = e.target;
      let val = ele.name.split("-");
      let index = val[1] * 1;

      if (e.target.value * 1 >= 0 && e.target.value * 1 < 8) {
        this.error2 = false;
        ele.addEventListener("keyup", (e) => {
          // if the keycode is backspace & the current field is empty
          // focus the input before the current. Then the event happens
          // which will clear the "before" input box.
          if (e.keyCode === 8 && e.target.value === "")
            inputElements[Math.max(0, index - 1)].focus();
        });
        // if the keycode is backspace & the current field is empty
        // focus the input before the current. Then the event happens
        // which will clear the "before" input box.
        if (e.keyCode === 8 && e.target.value === "")
          inputElements[Math.max(0, index - 1)].focus();
        ele.addEventListener("input", (e) => {
          // take the first character of the input
          // this actually breaks if you input an emoji like 👨‍👩‍👧‍👦....
          // but I'm willing to overlook insane security code practices.
          const [first, ...rest] = e.target.value;
          e.target.value = first ?? ""; // first will be undefined when backspace was entered, so set the input to ""
          const lastInputBox = index === inputElements.length - 1;
          const didInsertContent = first !== undefined;
          if (didInsertContent && !lastInputBox && inputElements[index + 1]) {
            // continue to input the rest of the string
            inputElements[index + 1].focus();
            inputElements[index + 1].value = rest.join("");
            inputElements[index + 1].dispatchEvent(new Event("input"));
          }
        });

        // mini example on how to pull the data on submit of the form
        function onSubmit(e) {
          e.preventDefault();
          const code = inputElements.map(({ value }) => value).join("");
          console.log(code);
        }
      } else {
        this.error2 = true;
      }
    },
    verifyData(e) {
      const inputElements = [...document.querySelectorAll("input.g3")];
      let ele = e.target;
      let val = ele.name.split("-");
      let index = val[1] * 1;

      if (e.target.value * 1 === 0 || e.target.value * 1 === 1) {
        this.error3 = false;
        ele.addEventListener("keyup", (e) => {
          // if the keycode is backspace & the current field is empty
          // focus the input before the current. Then the event happens
          // which will clear the "before" input box.
          if (e.keyCode === 8 && e.target.value === "")
            inputElements[Math.max(0, index - 1)].focus();
        });
        // if the keycode is backspace & the current field is empty
        // focus the input before the current. Then the event happens
        // which will clear the "before" input box.
        if (e.keyCode === 8 && e.target.value === "")
          inputElements[Math.max(0, index - 1)].focus();
        ele.addEventListener("input", (e) => {
          // take the first character of the input
          // this actually breaks if you input an emoji like 👨‍👩‍👧‍👦....
          // but I'm willing to overlook insane security code practices.
          const [first, ...rest] = e.target.value;
          e.target.value = first ?? ""; // first will be undefined when backspace was entered, so set the input to ""
          const lastInputBox = index === inputElements.length - 1;
          const didInsertContent = first !== undefined;
          if (didInsertContent && !lastInputBox && inputElements[index + 1]) {
            // continue to input the rest of the string
            inputElements[index + 1].focus();
            inputElements[index + 1].value = rest.join("");
            inputElements[index + 1].dispatchEvent(new Event("input"));
          }
        });

        // mini example on how to pull the data on submit of the form
        function onSubmit(e) {
          e.preventDefault();
          const code = inputElements.map(({ value }) => value).join("");
          console.log(code);
        }
      } else {
        this.error3 = true;
      }
    },
    verifyDataPermute(e) {
      const inputElements = [...document.querySelectorAll("input.g4")];
      let ele = e.target;
      let val = ele.name.split("-");
      let index = val[1] * 1;

      if (e.target.value * 1 >= 0 && e.target.value * 1 < 8) {
        this.error2 = false;
        ele.addEventListener("keyup", (e) => {
          // if the keycode is backspace & the current field is empty
          // focus the input before the current. Then the event happens
          // which will clear the "before" input box.
          if (e.keyCode === 8 && e.target.value === "")
            inputElements[Math.max(0, index - 1)].focus();
        });
        // if the keycode is backspace & the current field is empty
        // focus the input before the current. Then the event happens
        // which will clear the "before" input box.
        if (e.keyCode === 8 && e.target.value === "")
          inputElements[Math.max(0, index - 1)].focus();
        ele.addEventListener("input", (e) => {
          // take the first character of the input
          // this actually breaks if you input an emoji like 👨‍👩‍👧‍👦....
          // but I'm willing to overlook insane security code practices.
          const [first, ...rest] = e.target.value;
          e.target.value = first ?? ""; // first will be undefined when backspace was entered, so set the input to ""
          const lastInputBox = index === inputElements.length - 1;
          const didInsertContent = first !== undefined;
          if (didInsertContent && !lastInputBox && inputElements[index + 1]) {
            // continue to input the rest of the string
            inputElements[index + 1].focus();
            inputElements[index + 1].value = rest.join("");
            inputElements[index + 1].dispatchEvent(new Event("input"));
          }
        });

        // mini example on how to pull the data on submit of the form
        function onSubmit(e) {
          e.preventDefault();
          const code = inputElements.map(({ value }) => value).join("");
          console.log(code);
        }
      } else {
        this.error2 = true;
      }
    },
  },
}).mount("#app");
