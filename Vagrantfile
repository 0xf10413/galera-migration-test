Vagrant.configure("2") do |config|

  config.vm.provider :virtualbox do |v|
    v.memory = 1024
    v.cpus = 4
    v.linked_clone = true
  end

  config.vm.define "server1" do |app|
    app.vm.hostname = "m50"
    app.vm.box = "debian/buster64"
    app.vm.network :private_network, ip: "192.168.56.2"
  end

  config.vm.define "server2" do |app|
    app.vm.hostname = "vps-5c986c7f"
    app.vm.box = "debian/bullseye64"
    app.vm.network :private_network, ip: "192.168.56.3"
  end

  config.vm.provision "ansible" do |ansible|
    ansible.playbook = "playbook.yml"
  end

  # Create a forwarded port mapping which allows access to a specific port
  # within the machine from a port on the host machine. In the example below,
  # accessing "localhost:8080" will access port 80 on the guest machine.
  # NOTE: This will enable public access to the opened port
  # config.vm.network "forwarded_port", guest: 80, host: 8080

end
