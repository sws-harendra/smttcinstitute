// Mobile Menu Open
function openMenu() {
  document.getElementById("mobileMenu").classList.remove("hidden");
}

// Mobile Menu Close
function closeMenu() {
  document.getElementById("mobileMenu").classList.add("hidden");

  // Reset services dropdown when menu closes
  document.getElementById("servicesMenu").classList.add("hidden");
  document.getElementById("serviceArrow").classList.remove("rotate-180");
}

// Toggle Services Dropdown (Mobile)
function toggleServices() {
  const menu = document.getElementById("servicesMenu");
  const arrow = document.getElementById("serviceArrow");

  menu.classList.toggle("hidden");
  arrow.classList.toggle("rotate-180");
}

// Carousel logic moved to dynamic API fetch in index.html

//   Gallery slides
const images = [
  "assets/images/g1.webp",
  "assets/images/g2.webp",
  "assets/images/g3.webp",
];
const galleryImgEl = document.getElementById("galleryImage");
if (galleryImgEl) {
  let i = 0;
  setInterval(() => {
    i = (i + 1) % images.length;
    galleryImgEl.src = images[i];
  }, 3000);
}

// footer year update
const yearEl = document.getElementById("year");
if (yearEl) {
  yearEl.textContent = new Date().getFullYear();
}

// gallery page
const GalleryPageimages = document.querySelectorAll(".gallery-img");
const modal = document.getElementById("modal");
const modalImg = document.getElementById("modalImg");

if (GalleryPageimages.length > 0 && modal && modalImg) {
  GalleryPageimages.forEach((img) => {
    img.addEventListener("click", () => {
      modal.classList.remove("hidden");
      modal.classList.add("flex");
      modalImg.src = img.src;
    });
  });
}

function closeModal() {
  if (modal) {
    modal.classList.add("hidden");
    modal.classList.remove("flex");
  }
}

function openCourse(course) {
  const modal = document.getElementById("courseModal");
  const title = document.getElementById("courseTitle");
  const content = document.getElementById("courseContent");

  modal.classList.remove("hidden");
  modal.classList.add("flex");

  if (course === "ac") {
    title.innerText = "AC Repairing Course";
    content.innerHTML = `
      <p class="mb-6">
        Our <b>AC REPAIRING TRAINING INSTITUTE IN PATNA</b> offers a complete practical course that focuses on air conditioner installation servicing and repair work. This program is designed to help students clearly understand how split AC window AC and inverter AC systems function in real home and commercial settings.
      </p>
      <p class="mb-6">
        The course begins with basic refrigeration concepts and slowly moves towards advanced AC fault finding and professional servicing methods. Students are trained in important skills like gas charging, leak detection, electrical testing PCB basics and regular AC maintenance exactly the way experienced technicians work in the field. Proper safety practices and correct servicing methods followed at real service centers are given strong importance throughout the training.
      </p>

      <p class="mb-6">
        The training is fully practical oriented with hands-on practice on real AC units and professional tools. This method helps students gain confidence and prepares them to handle customer AC units independently once the course is completed.
      </p>

      <p class="mb-6">
        This <b>AC REPAIRING COURSE IN PATNA</b> is suitable for students who want to join AC service companies, start their own AC repairing business in Patna or earn seasonal income through installation and maintenance work. With the growing use of air conditioners in homes and offices AC repairing remains a high income and in demand technical skill.
      </p>

    `;
  }

  if (course === "washing") {
    title.innerText = "Washing Machine Repairing Course";
    content.innerHTML = `
      <p class="mb-6">
        The <b>WASHING MACHINE REPAIRING TRAINING INSTITUTE COURSE</b> is planned to give complete practical knowledge of both semi automatic and fully automatic washing machines. Students learn about different machine types, their working process and the common problems that occur during regular daily use.
      </p>
      <p class="mb-6">
        The training includes motor related issues, water inlet and drainage problems, spin and wash cycle faults, electrical troubleshooting and component replacement. Strong focus is given on understanding fault patterns and repairing machines in the right way using proper tools and correct methods followed in real service work.
      </p>

      <p class="mb-6">
        This course is suitable for beginners as well as technicians who want to improve and upgrade their skills. After completing the training students can work in appliance service centers, provide home service repairs or start their own washing machine repairing business. The demand for skilled washing machine technicians is increasing steadily in both residential and commercial areas.
      </p>

    `;
  }

  if (course === "fridge") {
    title.innerText = "Fridge Repairing Course";
    content.innerHTML = `
      <p class="mb-6">
        Our <b>FRIDGE REPAIRING TRAINING INSTITUTE IN PATNA</b> offers a practical and industry focused course that trains students in refrigerator servicing and repair work. The program explains the working of single door double door and frost free refrigerators so students clearly understand how cooling systems function in real life conditions.

      </p>
      <p class="mb-6">
        The training covers common refrigerator problems such as no cooling over cooling gas leakage, compressor faults, thermostat issues, fan motor problems and electrical wiring faults. Students get hands-on practice in gas charging leak detection electrical testing and regular maintenance work using professional tools and real refrigerator units.
This course gives strong importance to practical learning where students work on live repair cases under expert guidance. The main aim is to build confidence so students can independently attend service calls and handle customer repairs without hesitation.

      </p>

      <p class="mb-6">
        This FRIDGE REPAIRING COURSE is suitable for freshers tenth and twelfth pass students working technicians and business minded individuals. After completing the training students can work with appliance service centers providing home refrigerator repair services in Patna or start their own fridge repairing business. Since refrigerators are essential in every household, skilled technicians continue to enjoy steady demand and reliable income opportunities.
      </p>

    `;
  }

  if (course === "mobile") {
    title.innerText = "Mobile Repairing Course";
    content.innerHTML = `
      <p class="mb-6">
        Our <b>MOBILE REPAIRING TRAINING INSTITUTE IN PATNA</b> offers a practical and job oriented course created to build strong hands on skills in smartphone repairing. This training helps students learn how to find and repair common mobile phone problems like display damage, battery issues, charging faults, network problems and software related errors.
      </p>
      <p class="mb-6">
        The course is focused mainly on real world mobile repair work using actual Android smartphones and standard industry tools. Students are taught proper mobile opening techniques, component testing, safe part replacement and important software servicing tasks that are required in daily repair jobs. Extra attention is given to fault finding so students can quickly identify issues and give the right repair solution.
      </p>

      <p class="mb-6">
        This <b>MOBILE REPAIRING COURSE IN PATNA</b> is ideal for freshers students, job seekers and business minded individuals looking for quick earning options. After completing the training students can work as mobile technicians, start freelance mobile repair services in Patna or open their own mobile repairing shop with confidence.
With smartphones now being a part of everyday life the need for skilled mobile repair technicians is growing fast. Mobile repairing continues to be one of the most reliable and fast growing technical career choices today.

      </p>

    `;
  }

  if (course === "laptop") {
    title.innerText = "Laptop Repairing Course";
    content.innerHTML = `
      <p class="mb-6">
        Our <b>LAPTOP REPAIRING TRAINING INSTITUTE IN PATNA</b> provides practical skill based training in laptop hardware repair along with basic software servicing. This course helps students understand important internal laptop parts like motherboards, power circuits, display panels, keyboards , storage devices, batteries and cooling systems used in modern laptops.
      </p>
      <p class="mb-6">
        The training focuses on finding and fixing common laptop problems such as no power no display overheating, charging issues, slow performance and hardware related faults. Students practice on real laptops during the training and learn safe opening methods, component testing replacement techniques and professional servicing methods followed in service centers.
This hands-on training approach makes sure students gain real repair experience instead of only theoretical knowledge. The course is designed to build confidence so students can handle customer laptops independently and with accuracy.

      </p>

      <p class="mb-6">
       This <b> LAPTOP REPAIRING COURSE IN PATNA</b> is suitable for students freshers ITI candidates and working technicians who want to build a stable career in computer hardware repair or start their own laptop repairing service center in Patna. Since laptops are widely used in homes, offices, schools and businesses, skilled laptop technicians remain in constant demand.
      </p>

    `;
  }
}

function closeCourse() {
  const modal = document.getElementById("courseModal");
  modal.classList.add("hidden");
  modal.classList.remove("flex");
}

// FAQ Toggle Script
document.querySelectorAll(".faq-btn").forEach((button) => {
  button.addEventListener("click", () => {
    const content = button.nextElementSibling;
    const icon = button.querySelector("span");

    content.classList.toggle("hidden");
    icon.textContent = content.classList.contains("hidden") ? "+" : "−";
  });
});

