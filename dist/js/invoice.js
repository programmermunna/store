// // get view invoice
// const view_invoice = {
//   id: "1",
//   name: "aJohn Doe",
//   shop_name: "John Store",
//   addres: "Mohammadpur Dhaka",
//   city: "Dhaka",
//   date: "2022-04-04",
//   quantity: 4,
//   phone: "01339393939",
//   invoice_status: "pending",
//   invoice_id: "322",
//   payment: "handcash",
//   pay: 50000,
//   due: 4000,
//   sub_total: 54000,
//   vat: 1000,
//   total: 53000,
//   products: [
//     {
//       id: "1",
//       name: "Asus Laptop",
//       code: "F3492384",
//       quantity: 2,
//       unit_cost: 1000,
//       total: 30000,
//     },
//     {
//       id: "2",
//       name: "Desktop Computer (CPU)",
//       code: "A4392384",
//       quantity: 2,
//       unit_cost: 1000,
//       total: 24000,
//     },
//   ],
// };

// // Pending invoice done button functionality
// function done_func() {
//   // Call/Keep it 👇 for adjust nav active button
//   adjust_active_icon("all");

//   location.replace("/");
// }

// const invoice_details_wrapper = document.getElementById(
//   "invoice_details_wrapper"
// );
// invoice_details_wrapper.innerHTML = `
//     <div class="pb-5 binvoice-b flex flex-col items-end">
//     <p>invoice Date</p>
//     <b>${view_invoice.date}</b>
//   </div>
//   <div
//     class="flex flex-col md:flex-row justify-between items-start pt-5"
//   >
//     <div>
//       <p><b>Name:</b> ${view_invoice.name}</p>
//       <p><b>Shop Name:</b> ${view_invoice.shop_name}</p>
//       <p><b>Address:</b> ${view_invoice.addres}</p>
//       <p><b>City:</b> ${view_invoice.city}</p>
//       <p><b>Phone:</b> ${view_invoice.phone}</p>
//     </div>
//     <div>
//       <p><b>Today:</b> ${
//         new Date().toDateString() + " : " + new Date().toLocaleTimeString()
//       }</p>
//       <p><b>invoice Status:</b> <span class="px-1.5 py-0.5 rounded bg-yellow-100">${
//         view_invoice.invoice_status
//       }</span> </p>
//       <p><b>invoice ID:</b> ${view_invoice.quantity}</p>
//     </div>
//   </div>
//   <div class="py-7">
//     <div class="table_sub_parent capitalize">
//       <table class="table">
//         <thead>
//           <tr class="bg-gray-100">
//             <th class="table_th">
//               <span>#</span>
//             </th>
//             <th class="table_th">
//                 <span>Product Name</span>
//             </th>
//             <th class="table_th">
//                 <span>Product Code</span>
//             </th>
//             <th class="table_th">
//                 <span>Quantity</span>
//             </th>
//             <th class="table_th">
//               <span>Unit Cost</span>
//             </th>
//             <th class="table_th">
//                 <span>Total</span>
//             </th>
//           </tr>
//         </thead>
//         <tbody id="invoices_wrapper" class="text-sm">
//         ${view_invoice.products.map((product, i) => {
//           return `<tr>
//           <td class="p-3 binvoice text-center">${i + 1}</td>
//           <td class="p-3 binvoice text-center">${product.name}</td>
//           <td class="p-3 binvoice text-center">${product.code}</td>
//           <td class="p-3 binvoice text-center">${product.quantity}</td>
//           <td class="p-3 binvoice text-center">99</td>
//           <td class="p-3 binvoice text-center">${product.total}</td>
//          </tr>`;
//         })}
//         </tbody>
//       </table>
//     </div>
//   </div>
//   <div
//     class="text-lg flex flex-col md:flex-row justify-between items-start"
//   >
//     <div>
//       <p><b>Payment By:</b> Handcash</p>
//       <p><b>Pay:</b> ${view_invoice.pay}</p>
//       <p><b>Due:</b> ${view_invoice.due}</p>
//     </div>
//     <div>
//       <p><b>Sub total:</b> ${view_invoice.sub_total}</p>
//       <p><b>VAT:</b> ${view_invoice.vat}</p>
//     </div>
//   </div>
//   <div
//     class="binvoice-t mt-4 pt-4 text-3xl text-left md:text-right"
//   >
//     <p>Total: ${view_invoice.total}</p>
//   </div>
//   ${
//     view_invoice.invoice_status === "pending"
//       ? `<div
//     class="binvoice-t mt-4 pt-4 flex justify-end items-center gap-2"
//   >
//   <button onclick="print_page()" class="btn text-base bg-gray-700 hover:bg-gray-800 focus:bg-gray-600 focus:ring text-white w-fit h-10 px-5 flex_center rounded-sm"><svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
//   <path fill-rule="evenodd" d="M5 4v3H4a2 2 0 00-2 2v3a2 2 0 002 2h1v2a2 2 0 002 2h6a2 2 0 002-2v-2h1a2 2 0 002-2V9a2 2 0 00-2-2h-1V4a2 2 0 00-2-2H7a2 2 0 00-2 2zm8 0H7v3h6V4zm0 8H7v4h6v-4z" clip-rule="evenodd" />
//   </svg></button>
//   <button onclick="done_func()" class="btn text-base bg-green-600 hover:bg-green-700 focus:bg-green-500 focus:ring text-white w-fit h-10 px-5 flex_center rounded-sm">Submit</button>
//   </div>`
//       : ""
//   }
//     `;
