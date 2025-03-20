# Use Node.js 16 as the base image
FROM node:16

# Install Vue CLI globally
RUN npm install -g @vue/cli@~4.5.19

# Set the working directory inside the container to /vue
WORKDIR /vue

# Copy package.json and package-lock.json to the working directory
COPY package*.json ./

# Install dependencies based on the copied package files
RUN npm install

# Copy the rest of the application code into the container
COPY ./ ./

# Expose port 3000 for the Vue.js app (the default dev server port)
EXPOSE 3000

# Set the default command to run the Vue.js development server
ENTRYPOINT ["npm", "run", "serve"]
